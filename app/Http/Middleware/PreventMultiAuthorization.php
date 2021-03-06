<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventMultiAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('is_authorised') != false || session()->exists('user_id')) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
