<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminOnlyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()->role == 'super admin' || !Auth::user()->role == 'sub admin'){
            // $u = Auth::user()->role;
            // dd($u);
            return redirect()->route('home')->with('only admins access');
        }
        return $next($request);
    }
}
