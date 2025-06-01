<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('web')->check()) {
            if (
                url()->current() == route('login.page') || url()->current() == route('register.page') ||
                $request->is('/') || url()->current() == route('admin.login')
            ) {
                abort(404, 'Resource not found');
            }
            return $next($request);
        }
        abort(404, 'Resource not found');
    }
}
