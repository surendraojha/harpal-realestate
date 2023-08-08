<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Editor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if($user->role=='editor'){
            return redirect()->route('dashboard')->with('error','You Are Not Allowed To Perform This Action!!');
        }
        return $next($request);
    }
}
