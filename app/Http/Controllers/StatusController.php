<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class StatusController extends Controller
{
    #[OA\Get(
        path: "/status",
        summary: "Get API status",
        description: "Returns the status of the Laravel API backend"
    )]
    #[OA\Response(
        response: 200,
        description: "Successful operation",
        content: new OA\JsonContent(
            type: "object",
            properties: [
                new OA\Property(property: "status", type: "string", example: "ok"),
                new OA\Property(property: "message", type: "string", example: "Laravel API is running successfully!")
            ]
        )
    )]
    public function getStatus(): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'message' => 'Laravel API is running successfully!'
        ]);
    }
}
