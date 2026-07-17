<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function getAllTimesheets(Request $request)
    {
        $query = \App\Models\Timesheet::with(['employee', 'project']);

        if ($request->has('employee_id')) {
            $query->where('employee_id', $request->query('employee_id'));
        }

        if ($request->has('project_id')) {
            $query->where('project_id', $request->query('project_id'));
        }

        if ($request->has('from') && $request->has('to')) {
            $query->whereBetween('work_date', [$request->query('from'), $request->query('to')]);
        } elseif ($request->has('from')) {
            $query->where('work_date', '>=', $request->query('from'));
        } elseif ($request->has('to')) {
            $query->where('work_date', '<=', $request->query('to'));
        }

        if ($request->has('billable')) {
            $billable = filter_var($request->query('billable'), FILTER_VALIDATE_BOOLEAN);
            $query->where('billable', $billable);
        }

        $timesheets = $query->get();

        return response()->json([
            'success' => true,
            'data' => $timesheets
        ]);
    }

    public function createTimesheet(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'project_id' => 'required|exists:projects,id',
            'task_description' => 'required|string',
            'work_date' => 'required|date',
            'hours_worked' => 'required|numeric|min:0',
            'billable' => 'required|boolean',
        ]);

        $timesheet = \App\Models\Timesheet::query()->create($validated);

        // Load relations for response
        $timesheet->load(['employee', 'project']);

        return response()->json([
            'success' => true,
            'message' => 'Timesheet entry created successfully.',
            'data' => $timesheet
        ], 201);
    }

    public function updateTimesheet(Request $request, $id)
    {
        $timesheet = \App\Models\Timesheet::find($id);

        if (!$timesheet) {
            return response()->json([
                'success' => false,
                'message' => 'Timesheet entry not found.'
            ], 404);
        }

        $validated = $request->validate([
            'employee_id' => 'sometimes|required|exists:employees,id',
            'project_id' => 'sometimes|required|exists:projects,id',
            'task_description' => 'sometimes|required|string',
            'work_date' => 'sometimes|required|date',
            'hours_worked' => 'sometimes|required|numeric|min:0',
            'billable' => 'sometimes|required|boolean',
        ]);

        $timesheet->update($validated);

        // Load relations for response
        $timesheet->load(['employee', 'project']);

        return response()->json([
            'success' => true,
            'message' => 'Timesheet entry updated successfully.',
            'data' => $timesheet
        ]);
    }

    public function deleteTimesheet($id)
    {
        $timesheet = \App\Models\Timesheet::find($id);

        if (!$timesheet) {
            return response()->json([
                'success' => false,
                'message' => 'Timesheet entry not found.'
            ], 404);
        }

        $timesheet->delete();

        return response()->json([
            'success' => true,
            'message' => 'Timesheet entry deleted successfully.'
        ]);
    }

    public function getWeeklySummary(Request $request)
    {
        $weekStart = $request->query('week_start', \Carbon\Carbon::now()->startOfWeek()->toDateString());
        $weekEnd = \Carbon\Carbon::parse($weekStart)->addDays(6)->toDateString();

        $timesheets = \App\Models\Timesheet::with('employee')
            ->whereBetween('work_date', [$weekStart, $weekEnd])
            ->get();

        $grouped = $timesheets->groupBy('employee_id');

        $result = [];
        foreach ($grouped as $employeeId => $sheets) {
            $employee = $sheets->first()->employee;
            
            $days = [];
            $total = 0;
            
            for ($i = 0; $i < 7; $i++) {
                $date = \Carbon\Carbon::parse($weekStart)->addDays($i)->toDateString();
                $days[$date] = 0;
            }
            
            foreach ($sheets as $sheet) {
                // Ensure work_date format matches the key format (YYYY-MM-DD)
                // In some cases, Eloquent casts date to a Carbon instance.
                // It's safer to format it explicitly.
                $workDateStr = is_string($sheet->work_date) ? substr($sheet->work_date, 0, 10) : $sheet->work_date->toDateString();
                
                if (isset($days[$workDateStr])) {
                    $days[$workDateStr] += (float) $sheet->hours_worked;
                }
                $total += (float) $sheet->hours_worked;
            }
            
            $result[] = [
                'employee' => $employee,
                'days' => $days,
                'total' => $total
            ];
        }

        return response()->json([
            'success' => true,
            'week_start' => $weekStart,
            'week_end' => $weekEnd,
            'data' => $result
        ]);
    }
}
