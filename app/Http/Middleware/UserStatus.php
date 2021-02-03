<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatus
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
        if ( $request->user() && $request->user()->status == 'block') {
            Auth::logout();
            return redirect()->route('home')->with('error', trans('site.You have been banned by the administration'));
        }
        return $next($request);
    }
}
