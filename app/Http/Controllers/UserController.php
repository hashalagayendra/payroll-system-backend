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
