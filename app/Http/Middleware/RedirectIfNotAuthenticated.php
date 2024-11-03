<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAuthenticated extends BaseMiddleware
{
    protected $redirectTo = '/login';

    public function handle($request, $next)
    {
        if (! $request->user()->isAuthenticated()) {
            return redirect($this->redirectTo);
        }

        return $next($request);
    }
}
