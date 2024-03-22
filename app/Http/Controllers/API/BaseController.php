<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @param  mixed  $result result.
     * @param  string  $message message.
     * @return \Illuminate\Http\Response
     */
    public function sendResponse(mixed $result, string $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @param  string  $error error message.
     * @param  array  $errorMessages error messages.
     * @param  int  $code error code.
     * @return \Illuminate\Http\Response
     */
    public function sendError(string $error, array $errorMessages = [], int $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
