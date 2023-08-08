<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use File;

class SettingsController extends Controller
{
    public function index(){

        $setting = Setting::first();


        return view('admin.settings.settings',
            compact('setting')
        );
    }


    public function update(Request $request){


        $rules = [
            'company_name' => 'required',
            'company_logo' => 'mimes:jpg,png,gif',
            'favicon'=>'mimes:jpg,png,gif,svg',
            'address'=> 'required',
            'phone'=>'required',
            'mobile'=>'required',
            'choose_property_text'=>'required',
            'ad_video'=>'required',
            // 'boost_price'=>'required',
            'vendor_dashboard_content'=>'required',
            'banner' => 'mimes:jpg,png,gif,svg',


            'featured_term'=>'required',

        	'recommended_term'=>'required',

	        'new_deals_term'=>'required',
            'tagline'=>'max:150'

        ];



        $request->validate($rules);

        $setting = Setting::first();


        if(!$setting){

            $rules = [

                'company_logo' => 'required|mimes:jpg,png,gif',
                'favicon'=>'required|mimes:jpg,png,gif,svg',

            ];

            $setting = new Setting();
        }
        $setting->choose_property_text = $request->choose_property_text;
        $setting->company_name = $request->company_name;
        $setting->phone = $request->phone;

        $setting->mobile = $request->mobile;
        // $setting->video_text = $request->video_text;
        $setting->vendor_dashboard_content = $request->vendor_dashboard_content;



        $setting->tagline = $request->tagline;

        if ($request->hasFile('company_logo')) {

            $file = $request->file('company_logo');

            $old_path = public_path() . '/uploads/' . $setting->company_logo;


            if (File::exists($old_path)) {
                File::delete($old_path);
            }

            $path = public_path() . '/uploads/';

            $filename = date('Ymdhis') . '-' . $file->getClientOriginalName();

            $file->move($path, $filename);

            $setting->company_logo = $filename;
        }


        if ($request->hasFile('banner')) {

            $file = $request->file('banner');

            $old_path = public_path() . '/uploads/' . $setting->banner;


            if (File::exists($old_path)) {
                File::delete($old_path);
            }

            $filename = FileHelper::uploadImage($request->banner,1200,null,null);


            $setting->banner = $filename;
        }


        /* favicon */
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $old_path = public_path() . '/uploads/' . $setting->favicon;
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            $path = public_path() . '/uploads/';
            $filename = date('Ymdhis') . '-' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $setting->favicon = $filename;
        }


           /* qr code */
           if ($request->hasFile('qr_code')) {
            $file = $request->file('qr_code');
            $old_path = public_path() . '/uploads/' . $setting->qr_code;
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            $path = public_path() . '/uploads/';
            $filename = date('Ymdhis') . '-' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $setting->qr_code = $filename;
        }



        $setting->email = $request->email;
        $setting->address = $request->address;
        $setting->youtube = $request->youtube;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->tiktok = $request->tiktok;
        $setting->linkedin = $request->linkedin;
        $setting->ad_video = $request->ad_video;

        // $setting->boost_price = $request->boost_price;



        $setting->featured_term = $request->featured_term;
        $setting->recommended_term = $request->recommended_term;
        $setting->new_deals_term = $request->new_deals_term;

        $setting->save();


        return back()->with('message','Settings Updated Successfully!');
    }
}
