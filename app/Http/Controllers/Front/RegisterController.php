<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\VerifyUser;
use App\Models\AdvertisementPosition;
use App\Models\Meta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(){

        $advertisement = AdvertisementPosition::where('position','login-page')->get();

        $meta = Meta::where('module','Register Page')->first();

        return view('front.auth.register',
            compact('advertisement','meta')
        );
    }


    public function registerPost(Request $request){
        $rules = [
            'name'=>'required',
            'email'=>"required|unique:users,email",
            'phone'=>"required|unique:users,phone",
            'password'=>'required|min:8|confirmed',
            // 'gender'=>'required',

        ];

        $request->validate($rules);

        $information = new User();
        $information->name = $request->name;
        $information->email = $request->email;
        $information->password = Hash::make($request->password);
        $information->role = 'user';
        // $information->gender = $request->gender;
        $information->phone = $request->phone;



        $token = Str::random(64);
        $information->token = $token;
        $information->save();
            // ->queue(new OrderShipped($order));


        Mail::to($information->email)->send(new VerifyUser($token));


        return redirect()->route('register.verification')->with('message','User Registered Successfully!!');



    }


    public function verification(){

        return view('front.auth.verification');
    }


    public function verifyAccount($token){
        $verifyUser = User::where('token', $token)->first();
        $alert ='error';
        $message = 'This Token Is Expired';

        if(@$verifyUser){
                $verifyUser->status = '1';
                $verifyUser->email_verified_at = date('Y-m-d H:i:s');
                $verifyUser->token = null;
                $verifyUser->save();

                $alert='message';
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";

        }


      return redirect('/')->with($alert, $message);
    }
}
