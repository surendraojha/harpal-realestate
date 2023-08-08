<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ShiftHomeContentController extends Controller
{
    public function index(){
        return view('admin.shift-home-content.index');
    }


    public function store(Request $request){
        $rules = [
            'shift_home_content'=>'required'
        ];
        $request->validate($rules);

        $information = Setting::first();

        $information->shift_home_content = $request->shift_home_content;
        $information->save();

        return redirect()->back()
                ->with('message','Shift Home Content Updated Successfully!!');
    }

    
}
