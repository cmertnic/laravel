<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class Admin
{
    public function handle(Request $request, Closure $next)
    {

        if (!auth()->user() || !auth()->user()->isAdmin()) {
            Log::info('User  is not admin, redirecting to dashboard.');
            return redirect()->route('dashboard')->with('error', 'Авторизуйтесь под Администратором');
        }

        return $next($request);
    }

    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('admin.index'); 
    }
}
