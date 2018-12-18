<?php

namespace App\Http\Middleware;

use Closure;

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
        if (stripos($request->headers->get('content-type') ?? '', 'application/json') !== 0) {
            return response('Unsupported Media Type', 415);
        }

        return $next($request);
    }
}
