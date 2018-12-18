<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

/**
 * Class UnacceptableMiddleware
 */
class UnacceptableMiddleware
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure                  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $accept = (string)$request->headers->get('accept');

        if ($accept && stripos($accept, 'json') === false) {
            return response()->json([
                'status' => Response::HTTP_NOT_ACCEPTABLE,
                'message' => 'You must accept JSON',
            ], Response::HTTP_NOT_ACCEPTABLE);
        }

        return $next($request);
    }
}
