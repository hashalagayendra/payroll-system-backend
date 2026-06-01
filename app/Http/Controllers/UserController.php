<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Fetch all users from the database.
     */
    public function getAllUsers(): JsonResponse
    {
        $users = User::all();
        
        return response()->json($users);
    }

    /**
     * Validate request and register a new user.
     */
    public function registerUser(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'employee_code' => 'nullable|string|max:50|unique:employees,employee_code',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users,email|unique:employees,email',
            'phone' => 'nullable|string|max:30',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'join_date' => 'nullable|date',
            'employment_type' => 'nullable|string|max:30',
            'status' => 'nullable|string|max:30',
            'password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        try {
            $employee = Employee::create([
                'employee_code' => $validated['employee_code'] ?? null,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'dob' => !empty($validated['dob']) ? date('Y-m-d', strtotime($validated['dob'])) : null,
                'gender' => $validated['gender'] ?? null,
                'address' => $validated['address'] ?? null,
                'join_date' => !empty($validated['join_date']) ? date('Y-m-d', strtotime($validated['join_date'])) : null,
                'employment_type' => $validated['employment_type'] ?? null,
                'status' => $validated['status'] ?? null,
            ]);

            $user = User::create([
                'employee_id' => $employee->id,
                'email' => $validated['email'],
                'password_hash' => Hash::make($validated['password']),
            ]);

            DB::commit();

            return response()->json([
                'message' => 'User and Employee created successfully',
                'employee' => $employee,
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to create user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get a single user by their ID.
     */
    public function getUserById(User $user): JsonResponse
    {
        return response()->json($user);
    }

    /**
     * Update the name of an existing user.
     */
    public function updateUserName(Request $request, User $user): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user->update([
            'name' => $validated['name'],
        ]);

        return response()->json($user);
    }

    /**
     * Delete a user from the database.
     */
    public function deleteUser(User $user): JsonResponse
    {
        $user->delete();
        
        return response()->json(['message' => 'User deleted successfully.']);
    }
}
