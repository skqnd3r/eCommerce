<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::check()) {
            if (Auth::user()->admin != 0) {
                return $next($request);
            }
        }
        return redirect('catalogue')->with(['POP' => trans("Vous n'avez pas les droits d'accès à cette page.")]);
    }
}
