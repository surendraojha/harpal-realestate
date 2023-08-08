<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    public function dashboard(){

        $user = auth()->user();

        $profile = UserProfile::with('user')
        ->where('user_id',$user->id)
        ->first();

        $total_listed = Property::where('user_id',$user->id)->count();

        return view('front.dashboard',
            compact('user','total_listed','profile')
        );
    }

    public function logout(Request $request){
        Session::flush();

        Auth::logout();

        return redirect()->route('login');
    }


    public function changepassword(){
        $user = auth()->user();
        $profile = UserProfile::with('user')
        ->where('user_id',$user->id)
        ->first();
        return view('front.changepassword',
            compact('user','profile')
        );
    }

    public function changePasswordPost(Request $request){

        $rules = [
            'current_password'=>'required|min:8',

            'password'=>'required|min:8|confirmed'
        ];

        $request->validate($rules);


        $id = auth()->user()->id;

        $user =  User::find($id);

        if (Hash::check( $request->current_password,$user->password)) {

            // dd("inside");

            $user->password = Hash::make($request->password);
            // $user->plain_password = $request->password;
            $user->save();

            auth()->login($user, true);

        }else{

           return redirect()->back()->with('error','Invalid Old Password');

        }




        return redirect()->route('front.dashboard')->with('message','Password Changed Successfully!!');

    }
}
