<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        $information = AboutUs::first();

        return view('admin.about-us.index',
            compact('information')
        );
    }

    public function update(Request $request){

        $rules = [
            'title'=>'required|max:191',
            'description'=>'required',
            'featured_photo' => 'mimes:jpg,png,gif,svg',
            'photo' => 'mimes:jpg,png,gif,svg',
            'short_description'=>'required',
            'title_1' =>'required',
            'value_1' =>'required',
            'title_2' =>'required',
            'value_2' =>'required',
            'title_3' =>'required',
            'value_3' =>'required',
            'title_4' =>'required',
            'value_4' =>'required'
        ];

        $request->validate($rules);

        $information = AboutUs::first();

        if(!$information){
            $information = new AboutUs();
        }

        $information->subtitle = $request->subtitle;
        $information->title = $request->title;
        $information->description = $request->description;
        $information->short_description = $request->short_description;

        $information->title_1 = $request->title_1;
        $information->value_1 = $request->value_1;
        $information->title_2 = $request->title_2;
        $information->value_2 = $request->value_2;
        $information->title_3 = $request->title_3;
        $information->value_3 = $request->value_3;
        $information->title_4 = $request->title_4;
        $information->value_4 = $request->value_4;







        if($request->hasFile('photo'))

        {


            $filename = FileHelper::uploadImageWithWatermark($request->photo,1200,null,null);

            $information->photo = $filename;
         }

         if($request->hasFile('featured_photo')){
            $filename = FileHelper::uploadImageWithWatermark($request->featured_photo,1200,null,null);

            $information->featured_photo = $filename;
         }
        $information->save();

        return redirect()->route('about-us.index')->with('message','About Us Updated Successfully!!');
    }
}
