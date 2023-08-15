<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->hasRole('admin') && !$request->user()->hasRole('owner')) {
            return redirect('/');
        }

        return $next($request);
    }
}

