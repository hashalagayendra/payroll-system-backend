<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    public function index(Request $request)
    {
        $query = Bonus::with('employee')->orderBy('id', 'desc');

        if ($request->has('employee_id') && $request->employee_id != '') {
            $query->where('employee_id', $request->employee_id);
        }

        if ($request->has('month') && $request->month != '') {
            $query->where('month', $request->month);
        }

        if ($request->has('year') && $request->year != '') {
            $query->where('year', $request->year);
        }

        $bonuses = $query->get();

        return response()->json([
            'success' => true,
            'data' => $bonuses
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer',
            'reason' => 'nullable|string',
        ]);

        $bonus = Bonus::create($validated);
        $bonus->load('employee');

        return response()->json([
            'success' => true,
            'message' => 'Bonus added successfully.',
            'data' => $bonus
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $bonus = Bonus::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer',
            'reason' => 'nullable|string',
        ]);

        $bonus->update($validated);
        $bonus->load('employee');

        return response()->json([
            'success' => true,
            'message' => 'Bonus updated successfully.',
            'data' => $bonus
        ]);
    }

    public function destroy($id)
    {
        $bonus = Bonus::findOrFail($id);
        $bonus->delete();

        return response()->json([
            'success' => true,
            'message' => 'Bonus deleted successfully.'
        ]);
    }
}
