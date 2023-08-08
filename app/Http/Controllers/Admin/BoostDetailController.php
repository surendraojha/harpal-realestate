<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class BoostDetailController extends Controller
{
    public function index(){

        $information = Setting::first();

        return view('admin.boost-content.index',
            compact('information')
        );
    }

    public function store(Request $request){

        $rules = [
            'boost_description'=>'required',

        ];

        $request->validate($rules);

        $information = Setting::first();



        $information->boost_description = $request->boost_description;








        // if($request->hasFile('photo'))

        // {
        //     $file = $request->file('photo');
        //     $extension = '.'.$request->file('photo')->extension();
        //     $path = public_path().'/uploads/';
        //     $filename = date('ymdhis').$extension;
        //     $file->move($path, $filename);
        //     $information->photo = $filename;
        //  }

        //  if($request->hasFile('featured_photo'))

        // {
        //     $file = $request->file('featured_photo');
        //     $extension = '.'.$request->file('featured_photo')->extension();
        //     $path = public_path().'/uploads/';
        //     $filename = date('ymdhis').$extension;
        //     $file->move($path, $filename);
        //     $information->featured_photo = $filename;
        //  }
        $information->save();

        return redirect()->back()->with('message','Boost Content Updated Successfully!!');
    }
}
