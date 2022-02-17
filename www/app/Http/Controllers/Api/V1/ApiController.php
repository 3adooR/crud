<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    /**
     * Error if hasn't data
     * @return JsonResponse
     */
    public function errNotFound(): JsonResponse
    {
        return response()->json([
            'error' => true,
            'message' => 'No data for this client'
        ], 404);
    }
}
