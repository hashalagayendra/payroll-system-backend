<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Validate request and register a new user.
     */
    public function register(Request $request): JsonResponse
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
     * Login a user.
     */
    public function login(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password_hash)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        // Create an HTTP-only cookie for the token (valid for 1 day)
        $cookie = cookie('auth_token', $token, 60 * 24, '/', null, false, true, false, 'Lax');

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
          
        ])->withCookie($cookie);
    }
}
