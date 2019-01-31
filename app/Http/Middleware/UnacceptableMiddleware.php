<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

class UnacceptableMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
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
