<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::withCount(['departments', 'employees'])->get();
        return response()->json([
            'success' => true,
            'data' => $branches
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        $branch = Branch::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Branch created successfully.',
            'data' => $branch
        ]);
    }

    public function show($id)
    {
        $branch = Branch::with(['departments.designations', 'employees'])->find($id);
        if (!$branch) {
            return response()->json(['success' => false, 'message' => 'Branch not found'], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $branch
        ]);
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return response()->json(['success' => false, 'message' => 'Branch not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        $branch->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Branch updated successfully.',
            'data' => $branch
        ]);
    }

    public function destroy($id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return response()->json(['success' => false, 'message' => 'Branch not found'], 404);
        }
        
        $branch->delete();

        return response()->json([
            'success' => true,
            'message' => 'Branch deleted successfully.'
        ]);
    }
}
