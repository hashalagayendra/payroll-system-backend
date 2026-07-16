<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDocument;
use Illuminate\Http\Request;

class EmployeeDocumentController extends Controller
{
    public function getAllDocuments(Request $request)
    {
        $perPage = $request->input('per_page', 15);
        $query = EmployeeDocument::with('employee');

        // Filter by document type
        if ($request->has('type') && $request->type !== '' && $request->type !== 'All Document Types') {
            $query->where('type', $request->type);
        }

        // Filter by specific employee_id
        if ($request->has('employee_id') && $request->employee_id !== '') {
            $query->where('employee_id', $request->employee_id);
        }

        // Search by employee name
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->whereHas('employee', function ($q) use ($search) {
                $q->where('first_name', 'LIKE', "%{$search}%")
                  ->orWhere('last_name', 'LIKE', "%{$search}%")
                  ->orWhere('employee_code', 'LIKE', "%{$search}%");
            });
        }

        $documents = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $documents,
            'message' => 'Employee documents retrieved successfully'
        ]);
    }
}
