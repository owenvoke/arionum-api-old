<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\PreconditionFailedHttpException;

final class PreconditionHeaderMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $accept = (string)$request->headers->get('content-type');

        if (!$accept || stripos($accept, 'json') === false) {
            throw new PreconditionFailedHttpException('Use the application/json content type');
        }

        return $next($request);
    }
}
