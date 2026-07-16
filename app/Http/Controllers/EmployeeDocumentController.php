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

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'type' => 'required|string|max:100',
            'file' => 'required|file|max:10240', // Max 10MB
        ]);

        try {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Upload to Azure
            $path = \Illuminate\Support\Facades\Storage::disk('azure')->putFileAs(
                '', // Root of the container
                $file,
                $fileName
            );

            $document = EmployeeDocument::create([
                'employee_id' => $request->employee_id,
                'type' => $request->type,
                'file_url' => $path, // Store relative path/filename
            ]);

            return response()->json([
                'success' => true,
                'data' => clone $document->load('employee'),
                'message' => 'Document uploaded successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload document: ' . $e->getMessage()
            ], 500);
        }
    }
}
