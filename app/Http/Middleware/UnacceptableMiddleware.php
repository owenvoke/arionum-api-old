<?php

namespace App\Http\Middleware;

use Closure;

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
                'error' => 'You must accept JSON',
            ], 406);
        }

        return $next($request);
    }
}
