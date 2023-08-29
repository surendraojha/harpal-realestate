<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutusResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\FaqResource;
use App\Http\Resources\PageResource;
use App\Mail\FindMeRoom;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\FAQ;
use App\Models\Message;
use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class PageController extends Controller
{
    public function aboutUs(){
        $information = AboutUs::first();


        $data = new AboutusResource($information);


        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);

    }


    public function faq(){

        $informations = FAQ::orderBy('order')->get();

        $data = FaqResource::collection($informations);


        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);

    }


    public function page($slug){

        $information = Page::where('slug',$slug)->first();

        if(!$information){
            return response()->json(['status'=>'failed','message'=>'Page not found'],401);
        }

        $data =new PageResource($information);

        return response()->json(['status'=>'success','data'=>$data],200);


    }


    public function blogs(){

        $informations = Blog::orderBy('id','desc')->get();

        $data = BlogResource::collection($informations);


        return response()->json(['status'=>'success','data'=>$data],200);

    }


    public function contactUs(Request $request){
        $rules = [
            // 'contact_for'=>'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {



           $errors= ValidatorHelper::validatorMessage($validator);

            return response()->json(['errors' => $errors], 422);
            // return response()->json(['errors' => $validator->errors()], 422);
        }

        $request->validate($rules);

        $information = new Message();

        $information->contact_for = $request->contact_for ?? '';
        $information->name = $request->name;
        $information->email = $request->email;
        $information->phone = $request->phone;
        $information->message = $request->message;
        $information->user_id = $request->user_id??null;
        $information->save();



        $setting = Setting::first();

        if($information->user_id){
            $user = User::find($information->user_id);

            $emails =[$setting->email,$user->email];

        }else{
            $emails =[$setting->email];

        }

        Mail::to($emails)->send(new FindMeRoom($information));


        return response()->json(['status'=>'success','message'=>'Thank you for your inquiry, we will reach you as soon as possible!!']);
    }
}
