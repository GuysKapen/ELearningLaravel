<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** @noinspection PhpUndefinedFieldInspection */
        if (Auth::check() && (Auth::user()->role->id == 2 || Auth::user()->role->id == 1)) {
            return $next($request);
        } else {
            return redirect('login');
        }
    }
}
