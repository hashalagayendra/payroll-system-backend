<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class StatusController extends Controller
{
    public function getStatus(): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'message' => 'Laravel API is running successfully!'
        ]);
    }
}
