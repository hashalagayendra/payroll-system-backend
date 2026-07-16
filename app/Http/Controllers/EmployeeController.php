<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getAllEmployees()
    {
        $employees = Employee::with(['branch', 'department', 'designation', 'reportingManager'])->get();
        
        return response()->json([
            'success' => true,
            'data' => $employees,
            'message' => 'Employees retrieved successfully'
        ]);
    }
}
