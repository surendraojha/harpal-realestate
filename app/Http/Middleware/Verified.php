<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Verified
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

        if($user){
            if($user->status!=1) {
                Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    session()->flash('error','Your Account Is Not Verfied Yet ! Check Email To verify');

                                return redirect('user-login')->withInput();

            }
        }
        return $next($request);
    }
}
