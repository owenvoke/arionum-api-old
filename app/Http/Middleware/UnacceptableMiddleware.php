<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

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
            throw new NotAcceptableHttpException('You must accept JSON');
        }

        return $next($request);
    }
}
