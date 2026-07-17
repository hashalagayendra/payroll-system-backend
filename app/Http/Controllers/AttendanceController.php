<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function getDailyAttendance(Request $request)
    {
        $date = $request->input('date', Carbon::today()->toDateString());
        
        // Base query: All active employees
        $query = \App\Models\Employee::where('status', 'ACTIVE')
            ->with(['attendances' => function($q) use ($date) {
                $q->whereDate('date', $date);
            }]);

        // Optional filter by branch_id
        if ($request->has('branch_id') && $request->branch_id != '') {
            $query->where('branch_id', $request->branch_id);
        }

        // Optional filter by department_id
        if ($request->has('department_id') && $request->department_id != '') {
            $query->where('department_id', $request->department_id);
        }

        // Optional filter by status
        if ($request->has('status') && $request->status != '') {
            $status = $request->status;
            if ($status === 'NOT_MARKED') {
                $query->whereDoesntHave('attendances', function($q) use ($date) {
                    $q->whereDate('date', $date);
                });
            } else {
                $query->whereHas('attendances', function($q) use ($date, $status) {
                    $q->whereDate('date', $date)->where('status', $status);
                });
            }
        }

        $perPage = $request->input('per_page', 15);
        
        // We order by first_name so the list of employees is consistent
        $employees = $query->orderBy('first_name', 'asc')->paginate($perPage);

        return response()->json([
            'success' => true,
            'date' => $date,
            'data' => $employees
        ]);
    }

    public function markAttendance(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'check_in' => 'nullable|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i|after_or_equal:check_in',
            'status' => 'required|in:PRESENT,ABSENT,LATE,HALF_DAY',
        ]);

        // Use updateOrCreate so if an entry exists for that date, it gets updated instead of duplicating
        $attendance = Attendance::updateOrCreate(
            [
                'employee_id' => $validatedData['employee_id'],
                'date' => $validatedData['date']
            ],
            [
                'check_in' => $validatedData['check_in'] ?? null,
                'check_out' => $validatedData['check_out'] ?? null,
                'status' => $validatedData['status'],
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Attendance marked successfully',
            'data' => $attendance
        ]);
    }

    public function bulkMarkAttendance(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'status' => 'required|in:PRESENT,ABSENT,LATE,HALF_DAY',
        ]);

        $date = $request->date;
        $status = $request->status;

        // Find all active employees who don't already have an attendance record for this date
        $activeEmployees = \App\Models\Employee::where('status', 'ACTIVE')->get();
        
        $markedCount = 0;
        foreach ($activeEmployees as $employee) {
            $exists = Attendance::where('employee_id', $employee->id)->whereDate('date', $date)->exists();
            if (!$exists) {
                Attendance::create([
                    'employee_id' => $employee->id,
                    'date' => $date,
                    'check_in' => in_array($status, ['PRESENT', 'LATE', 'HALF_DAY']) ? '09:00:00' : null,
                    'check_out' => in_array($status, ['PRESENT', 'LATE', 'HALF_DAY']) ? '17:00:00' : null,
                    'status' => $status
                ]);
                $markedCount++;
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Successfully marked $markedCount employees as $status for $date.",
        ]);
    }

    public function getMonthlySummary(Request $request)
    {
        $request->validate([
            'month' => 'nullable|integer|min:1|max:12',
            'year' => 'nullable|integer|min:2000|max:2100'
        ]);

        $month = $request->input('month', Carbon::today()->month);
        $year = $request->input('year', Carbon::today()->year);

        $query = \App\Models\Employee::where('status', 'ACTIVE');
        
        if ($request->has('branch_id') && $request->branch_id != '') {
            $query->where('branch_id', $request->branch_id);
        }
        
        if ($request->has('department_id') && $request->department_id != '') {
            $query->where('department_id', $request->department_id);
        }

        if ($request->has('designation_id') && $request->designation_id != '') {
            $query->where('designation_id', $request->designation_id);
        }

        $employees = $query->get();
        
        // Fetch all attendance records for this month
        $attendances = Attendance::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();

        $employeeStats = [];
        $globalStats = [
            'present' => 0,
            'absent' => 0,
            'late' => 0,
            'half_day' => 0
        ];

        foreach ($employees as $emp) {
            $empAttendances = $attendances->where('employee_id', $emp->id);
            
            $present = $empAttendances->where('status', 'PRESENT')->count();
            $absent = $empAttendances->where('status', 'ABSENT')->count();
            $late = $empAttendances->where('status', 'LATE')->count();
            $halfDay = $empAttendances->where('status', 'HALF_DAY')->count();

            $globalStats['present'] += $present;
            $globalStats['absent'] += $absent;
            $globalStats['late'] += $late;
            $globalStats['half_day'] += $halfDay;

            $employeeStats[] = [
                'employee_id' => $emp->id,
                'employee_code' => $emp->employee_code,
                'first_name' => $emp->first_name,
                'last_name' => $emp->last_name,
                'present' => $present,
                'absent' => $absent,
                'late' => $late,
                'half_day' => $halfDay,
                'total_marked' => $present + $absent + $late + $halfDay
            ];
        }

        // Generate Daily Trend
        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;
        $dailyTrend = [];
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $dateStr = sprintf('%04d-%02d-%02d', $year, $month, $i);
            $dayRecords = $attendances->filter(function ($att) use ($dateStr) {
                return Carbon::parse($att->date)->toDateString() === $dateStr;
            });
            $dailyTrend[] = [
                'date' => $dateStr,
                'day' => $i,
                'present' => $dayRecords->where('status', 'PRESENT')->count(),
                'absent' => $dayRecords->where('status', 'ABSENT')->count(),
                'late' => $dayRecords->where('status', 'LATE')->count(),
                'half_day' => $dayRecords->where('status', 'HALF_DAY')->count(),
            ];
        }

        return response()->json([
            'success' => true,
            'month' => $month,
            'year' => $year,
            'global_stats' => $globalStats,
            'daily_trend' => $dailyTrend,
            'employee_stats' => $employeeStats
        ]);
    }

    public function exportAttendance(Request $request)
    {
        $request->validate([
            'month' => 'nullable|integer|min:1|max:12',
            'year' => 'nullable|integer|min:2000|max:2100'
        ]);

        $month = $request->input('month', Carbon::today()->month);
        $year = $request->input('year', Carbon::today()->year);

        $employees = \App\Models\Employee::where('status', 'ACTIVE')->get();
        $attendances = Attendance::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();

        $csvFileName = "attendance_export_{$year}_{$month}.csv";
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Employee Code', 'First Name', 'Last Name', 'Present', 'Absent', 'Late', 'Half Day', 'Total Marked'];

        $callback = function() use($employees, $attendances, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($employees as $emp) {
                $empAttendances = $attendances->where('employee_id', $emp->id);
                $present = $empAttendances->where('status', 'PRESENT')->count();
                $absent = $empAttendances->where('status', 'ABSENT')->count();
                $late = $empAttendances->where('status', 'LATE')->count();
                $halfDay = $empAttendances->where('status', 'HALF_DAY')->count();

                fputcsv($file, [
                    $emp->employee_code,
                    $emp->first_name,
                    $emp->last_name,
                    $present,
                    $absent,
                    $late,
                    $halfDay,
                    $present + $absent + $late + $halfDay
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
