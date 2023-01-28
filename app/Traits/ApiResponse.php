<?php
namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    public function successData($data, $message = 'success')
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function successResponse($message)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => $message,
        ]);
    }

    public function badRequest($message, $error = 'bad_request')
    {
        return response()->json([
            'status' => Response::HTTP_BAD_REQUEST,
            'error' => $error,
            'message' => $message,
        ], Response::HTTP_BAD_REQUEST);
    }

    public function unauthorized($message, $error = 'unauthorized')
    {
        return response()->json([
            'status' => Response::HTTP_UNAUTHORIZED,
            'error' => $error,
            'message' => $message,
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function forbidden($message, $error = 'forbidden')
    {
        return response()->json([
            'status' => Response::HTTP_FORBIDDEN,
            'error' => $error,
            'message' => $message,
        ], Response::HTTP_FORBIDDEN);
    }
}
