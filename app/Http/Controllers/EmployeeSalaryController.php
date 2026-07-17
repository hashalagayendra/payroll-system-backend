<?php

namespace App\Http\Controllers;

use App\Models\EmployeeSalary;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function index(Request $request)
    {
        $query = EmployeeSalary::with([
            'employee',
            'salaryStructure.designation'
        ])->orderBy('id', 'desc');

        if ($request->has('employee_id') && $request->employee_id != '') {
            $query->where('employee_id', $request->employee_id);
        }

        $salaries = $query->get();

        return response()->json([
            'success' => true,
            'data' => $salaries
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'salary_structure_id' => 'required|exists:salary_structures,id',
            'basic_salary_override' => 'nullable|numeric',
            'effective_from' => 'nullable|date',
            'effective_to' => 'nullable|date|after_or_equal:effective_from',
        ]);

        // Check if there is an overlapping active salary assignment if needed, 
        // but for now we'll just create it as per simple specification.

        $salary = EmployeeSalary::create($validated);
        
        $salary->load(['employee', 'salaryStructure.designation']);

        return response()->json([
            'success' => true,
            'message' => 'Employee salary assigned successfully.',
            'data' => $salary
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $salary = EmployeeSalary::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'salary_structure_id' => 'required|exists:salary_structures,id',
            'basic_salary_override' => 'nullable|numeric',
            'effective_from' => 'nullable|date',
            'effective_to' => 'nullable|date|after_or_equal:effective_from',
        ]);

        $salary->update($validated);

        $salary->load(['employee', 'salaryStructure.designation']);

        return response()->json([
            'success' => true,
            'message' => 'Employee salary updated successfully.',
            'data' => $salary
        ]);
    }

    public function destroy($id)
    {
        $salary = EmployeeSalary::findOrFail($id);
        $salary->delete();

        return response()->json([
            'success' => true,
            'message' => 'Employee salary assignment deleted successfully.'
        ]);
    }
}
