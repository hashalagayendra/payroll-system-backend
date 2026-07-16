<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
        return response()->json(['success' => true, 'data' => []]);
    }

    public function getUserById($id)
    {
        return response()->json(['success' => true, 'data' => null]);
    }

    public function updateUserName(Request $request, $id)
    {
        return response()->json(['success' => true, 'data' => null]);
    }

    public function deleteUser($id)
    {
        return response()->json(['success' => true]);
    }
}
