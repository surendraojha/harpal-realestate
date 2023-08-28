<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutusResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\FaqResource;
use App\Http\Resources\PageResource;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\FAQ;
use App\Models\Page;
use Illuminate\Http\Request;

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
}
