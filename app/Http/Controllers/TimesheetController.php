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
}
