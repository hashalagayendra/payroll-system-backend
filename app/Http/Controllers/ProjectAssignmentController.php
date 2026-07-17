<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectAssignment;
use App\Models\Project;

class ProjectAssignmentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'employee_id' => 'required|exists:employees,id',
            'role' => 'nullable|string|max:255',
        ]);

        // Prevent duplicate assignments
        $existing = ProjectAssignment::where('project_id', $validated['project_id'])
            ->where('employee_id', $validated['employee_id'])
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Employee is already assigned to this project'
            ], 422);
        }

        $assignment = ProjectAssignment::create($validated);
        $assignment->load('employee'); // Load relationship for frontend

        return response()->json([
            'success' => true,
            'message' => 'Team member assigned successfully',
            'data' => $assignment
        ], 201);
    }

    public function destroy($id)
    {
        $assignment = ProjectAssignment::findOrFail($id);
        $assignment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Team member removed successfully'
        ]);
    }
}
