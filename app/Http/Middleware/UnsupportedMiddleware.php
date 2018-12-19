<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

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
            throw new UnsupportedMediaTypeHttpException();
        }

        return $next($request);
    }
}
