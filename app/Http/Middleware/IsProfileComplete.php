<?php

namespace App\Http\Middleware;

use App\Models\UserProfile;
use Closure;
use Illuminate\Http\Request;

class IsProfileComplete
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
            $profile = UserProfile::where('user_id',$user->id)->first();

            if(!$profile){
                return redirect()
                        ->route('profile')
                        ->with('error','To be able to list property, please complete your profile details first!!');
            }
        }

        return $next($request);
    }
}
