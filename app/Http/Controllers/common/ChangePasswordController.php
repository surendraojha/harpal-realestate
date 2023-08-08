<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  Session;

class ChangePasswordController extends Controller
{
    public function showForm(){


        $user = auth()->user();


        if($user->role=='admin'){
            return view('admin.change-password.change-password');

        }else{
            return view('agent.change-password.change-password');

        }
    }

    public function changePassword(Request $request){


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



        Session::flash('message', 'Password changed successfully!');
        Session::flash('alert-class', 'alert-danger');



        return redirect()->route('agent.dashboard');

    }
}
