<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\BoostMailAdmin;
use App\Models\BoostPost;
use App\Models\Property;
use App\Models\Setting;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Mail;

class BoostController extends Controller
{
    public function boost($slug){
        $information = Property::where('slug',$slug)->firstOrFail();
        $user = auth()->user();
        return view('front.property.boost',
            compact('information','user')
        );
    }

    public function boostPost(Request $request){
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'subscription_id'=>'required'
        ];

        $request->validate($rules);


        $information = new BoostPost();

        $information->property_id = $request->property_id;

        $information->message = $request->message;
        $information->name = $request->name;
        $information->email = $request->email;
        $information->phone = $request->phone;

        $information->subscription_id = $request->subscription_id;
        if($request->hasFile('deposit_slip'))
        {
           $file = $request->file('deposit_slip');
           $extension = '.'.$request->file('deposit_slip')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->deposit_slip = $filename;
        }

        $information->save();

        $setting = Setting::first();
        Mail::to($setting->email)->send(new BoostMailAdmin($information));

        return redirect()->back()->with('message','Boost Request Sent , We will response as soon as possible');

    }
}
