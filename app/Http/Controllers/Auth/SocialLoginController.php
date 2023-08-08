<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use File;

class SocialLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    // use AuthenticatesUsers;

    public function redirectToGoogle()
    {


        // dd('here');
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $data = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $data->email)->first();
        if (!$user) {
            $password_generated = Str::random(10);

            $password_generated = Str::random(10);

            $fileContents = file_get_contents($data->getAvatar());
            $user_profile = File::put(public_path() . '/uploads/' . $data->getId() . ".jpg", $fileContents);
            $name = $data->getId() . ".jpg";


            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'provider_id' => $data->id,
                // 'avatar' => $data->id,
                'role'=>'user',
                'password' => Hash::make($password_generated),
                'status'=>'1'
            ]);


            // $user->notify(new UserInvited($user, $password_generated));
            // $user->save();


            $userProfile = new UserProfile();
            $userProfile->photo = $name;
            $userProfile->user_id = $user->id;
            // $userProfile->dob = date('Y-m-d');
            $userProfile->user_type = 'agent';
            $userProfile->save();
        }
        $login = Auth::login($user);

        return redirect()->intended(route('profile'));
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $data = Socialite::driver('facebook')->stateless()->user();
        // dd($data);

        if (!@$data->user['email']) {
            $email = $data->user['id'] . '@facebook.com';
        } else {
            $email = $data->user['email'];

        }

        $user = User::where('email', $email)->first();


        if (!$user) {
            $password_generated = Str::random(10);

            $fileContents = file_get_contents($data->getAvatar());
            $user_profile = File::put(public_path() . '/uploads/' . $data->getId() . ".jpg", $fileContents);
            $name = $data->getId() . ".jpg";


            $user = User::create([
                'name' => $data->name,
                'email' => $email,
                'provider_id' => $data->id,
                // 'avatar' => $data->id,
                'role'=>'user',
                'password' => Hash::make($password_generated),
                'status'=>'1'

            ]);


            // $user->notify(new UserInvited($user, $password_generated));
            // $user->save();


            $userProfile = new UserProfile();
            $userProfile->photo = $name;
            $userProfile->user_id = $user->id;
            $userProfile->dob = date('Y-m-d');
            $userProfile->user_type = 'agent';
            $userProfile->save();


        }


        if(Auth::check())//if user is logged
        {
            return redirect()->intended(route('profile'));

        }else //if user is not login in
        {
            Auth::login($user);

        }

        return redirect()->intended(route('profile'));
    }

    protected function authenticated(Request $request)
    {
        return redirect()->intended(route('profile'));
    }


}
