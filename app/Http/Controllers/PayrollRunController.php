<?php

namespace App\Http\Controllers;

use App\Models\PayrollRun;
use Illuminate\Http\Request;

class PayrollRunController extends Controller
{
    public function index(Request $request)
    {
        $query = PayrollRun::with('branch')
            ->withCount('payrollSlips as employees_count')
            ->withSum('payrollSlips as total_amount', 'net_salary');

        if ($request->has('year') && $request->year) {
            $query->where('year', $request->year);
        }

        if ($request->has('branch_id') && $request->branch_id) {
            $query->where('branch_id', $request->branch_id);
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $query->orderBy('year', 'desc')->orderBy('month', 'desc');

        $payrollRuns = $query->get();

        return response()->json([
            'success' => true,
            'data' => $payrollRuns
        ]);
    }
}
