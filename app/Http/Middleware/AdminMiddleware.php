<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && (auth()->user()->user_type === 'ADMIN' || auth()->user()->user_type === 'STYLIST')) {
            return $next($request); // Cho phép người dùng admin truy cập
        }
        return redirect('/404');
    }
}
