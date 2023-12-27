<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsActive
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->status > 0) {
            return $next($request);
        }
        return redirect()->route('acctPending', Auth::id());
    }

}
