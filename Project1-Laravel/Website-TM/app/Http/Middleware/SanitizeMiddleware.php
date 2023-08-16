<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SanitizeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get all input data from the request
        $input = $request->all();

        // Recursively sanitize the input data
        $input = $this->sanitize($input);

        // Replace the request's input data with the sanitized data
        $request->replace($input);

        // Allow the request to proceed
        return $next($request);
    }

    protected function sanitize($value)
    {
        if (is_array($value)) {
            return array_map([$this, 'sanitize'], $value);
        }
        return strip_tags($value);
    }
}
