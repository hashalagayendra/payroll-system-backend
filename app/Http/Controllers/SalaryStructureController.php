<?php

namespace App\Http\Controllers;

use App\Models\SalaryStructure;
use Illuminate\Http\Request;

class SalaryStructureController extends Controller
{
    public function index()
    {
        $structures = SalaryStructure::with('designation.department')->get();
        return response()->json([
            'success' => true,
            'data' => $structures
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'designation_id' => 'required|exists:designations,id',
            'basic_salary' => 'nullable|numeric',
            'overtime_rate' => 'nullable|numeric',
            'allowance_default' => 'nullable|numeric',
        ]);

        $structure = SalaryStructure::create($validated);
        
        // Load relationships for the response
        $structure->load('designation.department');

        return response()->json([
            'success' => true,
            'message' => 'Salary structure created successfully.',
            'data' => $structure
        ], 201);
    }

    public function show($id)
    {
        $structure = SalaryStructure::with('designation.department')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $structure
        ]);
    }

    public function update(Request $request, $id)
    {
        $structure = SalaryStructure::findOrFail($id);

        $validated = $request->validate([
            'designation_id' => 'sometimes|required|exists:designations,id',
            'basic_salary' => 'nullable|numeric',
            'overtime_rate' => 'nullable|numeric',
            'allowance_default' => 'nullable|numeric',
        ]);

        $structure->update($validated);
        
        $structure->load('designation.department');

        return response()->json([
            'success' => true,
            'message' => 'Salary structure updated successfully.',
            'data' => $structure
        ]);
    }

    public function destroy($id)
    {
        $structure = SalaryStructure::findOrFail($id);
        $structure->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Salary Structure deleted successfully'
        ]);
    }
}
