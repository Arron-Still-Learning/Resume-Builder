<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // \Log::info(Auth::guard('admin')->check());
        if (Auth::guard('admin')->check()) {
            $restrictedRoutes = [
                '/',
                route('admin.login'),
                route('register.page'),
                route('admin.login')
            ];
            if (in_array($request->url(), $restrictedRoutes)) {
                abort(404, 'Resource not found');
            }
            return $next($request);
        }
        abort(404, 'Resource not found');
    }
}
