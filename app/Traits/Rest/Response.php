<?php

namespace App\Traits\Rest;

use Illuminate\Http\JsonResponse;

/**
 * Class Response.
 */
trait Response
{
    /**
     * Response json with message and data.
     */
    public function response($data = null, ?string $message = null, int $code = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
