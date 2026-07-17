<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index(Request $request)
    {
        $query = Designation::with('department.branch')->withCount('employees');

        if ($request->has('department_id') && $request->department_id !== '') {
            $query->where('department_id', $request->department_id);
        }

        if ($request->has('level') && $request->level !== '') {
            $query->where('level', $request->level);
        }

        $designations = $query->get();

        return response()->json([
            'success' => true,
            'data' => $designations
        ]);
    }

    public function show($id)
    {
        $designation = Designation::with(['department.branch', 'employees'])->find($id);
        
        if (!$designation) {
            return response()->json(['success' => false, 'message' => 'Designation not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $designation
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'level' => 'required|in:Junior,Mid,Senior',
        ]);

        $designation = Designation::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Designation created successfully.',
            'data' => $designation
        ]);
    }

    public function update(Request $request, $id)
    {
        $designation = Designation::find($id);
        if (!$designation) {
            return response()->json(['success' => false, 'message' => 'Designation not found'], 404);
        }

        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'level' => 'required|in:Junior,Mid,Senior',
        ]);

        $designation->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Designation updated successfully.',
            'data' => $designation
        ]);
    }

    public function destroy($id)
    {
        $designation = Designation::find($id);
        if (!$designation) {
            return response()->json(['success' => false, 'message' => 'Designation not found'], 404);
        }

        $designation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Designation deleted successfully.'
        ]);
    }
}
