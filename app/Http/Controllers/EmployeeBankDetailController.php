<?php

namespace App\Http\Controllers;

use App\Models\EmployeeBankDetail;
use Illuminate\Http\Request;

class EmployeeBankDetailController extends Controller
{
    public function getAllBankDetails(Request $request)
    {
        $query = EmployeeBankDetail::with('employee');

        if ($request->has('employee_id') && $request->employee_id != '') {
            $query->where('employee_id', $request->employee_id);
        }

        // Pagination
        $perPage = $request->input('per_page', 15);
        $bankDetails = $query->latest()->paginate($perPage);
        
        $bankDetails->getCollection()->transform(function ($detail) {
            // Mask the account number, showing only the last 4 digits
            $accountLength = strlen($detail->account_number);
            if ($accountLength > 4) {
                $detail->masked_account_number = str_repeat('*', $accountLength - 4) . substr($detail->account_number, -4);
            } else {
                $detail->masked_account_number = $detail->account_number;
            }
            return $detail;
        });

        return response()->json([
            'success' => true,
            'data' => $bankDetails
        ]);
    }

    public function createBankDetail(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'swift_code' => 'required|string|max:255',
        ]);

        $bankDetail = EmployeeBankDetail::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Bank details added successfully',
            'data' => $bankDetail
        ], 201);
    }

    public function updateBankDetail(Request $request, $id)
    {
        $bankDetail = EmployeeBankDetail::findOrFail($id);

        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'swift_code' => 'required|string|max:255',
        ]);

        $bankDetail->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Bank details updated successfully',
            'data' => $bankDetail
        ]);
    }

    public function deleteBankDetail($id)
    {
        $bankDetail = EmployeeBankDetail::findOrFail($id);
        $bankDetail->delete();

        return response()->json([
            'success' => true,
            'message' => 'Bank details deleted successfully'
        ]);
    }
}
