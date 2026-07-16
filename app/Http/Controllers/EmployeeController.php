<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function getAllEmployees(Request $request)
    {
        $perPage = $request->input('per_page', 15);
        $employees = Employee::with(['branch', 'department', 'designation', 'reportingManager'])->paginate($perPage);
        
        return response()->json([
            'success' => true,
            'data' => $employees,
            'message' => 'Employees retrieved successfully'
        ]);
    }

    public function createEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_code' => 'required|string|max:50|unique:employees',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:employees',
            'phone' => 'nullable|string|max:30',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'join_date' => 'nullable|date',
            'employment_type' => 'nullable|string|max:30',
            'status' => 'nullable|string|max:30',
            'branch_id' => 'nullable|exists:branches,id',
            'department_id' => 'nullable|exists:departments,id',
            'designation_id' => 'nullable|exists:designations,id',
            'reporting_manager_id' => 'nullable|exists:employees,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $employee = Employee::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $employee,
            'message' => 'Employee created successfully'
        ], 201);
    }

    public function updateEmployee(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'success' => false,
                'message' => 'Employee not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'employee_code' => 'required|string|max:50|unique:employees,employee_code,' . $id,
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:employees,email,' . $id,
            'phone' => 'nullable|string|max:30',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'join_date' => 'nullable|date',
            'employment_type' => 'nullable|string|max:30',
            'status' => 'nullable|string|max:30',
            'branch_id' => 'nullable|exists:branches,id',
            'department_id' => 'nullable|exists:departments,id',
            'designation_id' => 'nullable|exists:designations,id',
            'reporting_manager_id' => 'nullable|exists:employees,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $employee->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $employee,
            'message' => 'Employee updated successfully'
        ], 200);
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'success' => false,
                'message' => 'Employee not found'
            ], 404);
        }

        $employee->delete();

        return response()->json([
            'success' => true,
            'message' => 'Employee deleted successfully'
        ], 200);
    }
}

