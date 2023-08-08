<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\AdvertisementPosition;
use App\Models\Meta;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(){

        $advertisement = AdvertisementPosition::where('position','login-page')->get();
        $meta = Meta::where('module','Login Page')->first();
        return view('auth.login',
            compact('advertisement','meta')
        );
    }

    public function loginPost(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('name',$request->name)->first();

        if (auth()->attempt($credentials)) {

                if(auth()->user()->status!=1) {
                    \Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('error','Your Account Is Not Verfied Yet ! Check Email To verify');

                                    return redirect('user-login')->withInput();

                }

            if(auth()->user()->role=='user'){
                return redirect()->route('front.dashboard');

            }else{
                return redirect('iv-admin');
            }

        }else{
            session()->flash('error', 'Invalid credentials');
            return redirect()->back()->withInput();
        }
    }
}
