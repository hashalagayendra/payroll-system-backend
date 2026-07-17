<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('assignments.employee');

        if ($request->has('status') && $request->status !== 'All Statuses') {
            $query->where('status', $request->status);
        }
        
        if ($request->has('billing_type') && $request->billing_type !== 'All Types') {
            $query->where('billing_type', $request->billing_type);
        }

        return response()->json([
            'success' => true,
            'data' => $query->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:ACTIVE,COMPLETED,ON_HOLD',
            'billing_type' => 'required|string|in:HOURLY,FIXED',
        ]);

        $project = Project::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Project created successfully',
            'data' => $project->load('assignments.employee')
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:ACTIVE,COMPLETED,ON_HOLD',
            'billing_type' => 'required|string|in:HOURLY,FIXED',
        ]);

        $project->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Project updated successfully',
            'data' => $project->load('assignments.employee')
        ]);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // cascade deletes assignments & timesheets
        $project->assignments()->delete();
        $project->timesheets()->delete();
        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Project deleted successfully'
        ]);
    }
}
