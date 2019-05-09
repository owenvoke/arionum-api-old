<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\PreconditionFailedHttpException;

final class PreconditionHeaderMiddleware
{
    public function handle($request, Closure $next)
    {
        $contentType = (string) $request->headers->get('content-type');

        if (! $contentType || $contentType !== 'application/json') {
            throw new PreconditionFailedHttpException('Use the application/json content type');
        }

        return $next($request);
    }
}
