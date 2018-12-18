<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

/**
 * Class UnsupportedMiddleware
 */
class UnsupportedMiddleware
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure                  $next
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory|mixed
     */
    public function handle($request, Closure $next)
    {
        if (stripos((string)$request->headers->get('content-type'), 'application/json') !== 0) {
            return response()->json([
                'status' => Response::HTTP_UNSUPPORTED_MEDIA_TYPE,
                'message' => 'Unsupported Media Type',
            ], Response::HTTP_UNSUPPORTED_MEDIA_TYPE);
        }

        return $next($request);
    }
}
