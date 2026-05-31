<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: "Laravel API Backend",
    version: "1.0.0",
    description: "API documentation for Laravel Backend"
)]
#[OA\Server(
    url: "http://127.0.0.1:8000/api",
    description: "Local Development API Server"
)]
abstract class Controller
{
    //
}
