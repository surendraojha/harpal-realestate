<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeStayVideo;
use Illuminate\Http\Request;

class HomeStayVideoController extends Controller
{
    public function __construct()
    {
       $this->module = 'Home Stay Video';
    }

   public function index()
   {



       $informations = HomeStayVideo::orderBy('order')->paginate(50);



       $module = $this->module;

       return view('admin.home-stay-video.index',
           compact('informations',
                   'module'
           )
       );
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $rules = [
        'link'=>'required',
        'status'=>'required',
        'order'=>'required'
       ];

    //    $msg = ['property_id.unique'=>'Property is already exists'];


       $request->validate($rules);


       $information = new HomeStayVideo();
       $information->link = $request->link;
       $information->status = $request->status;
       $information->order = $request->order;
       $information->save();


       return redirect()
               ->route('home-stay-video.index')
               ->with('message','Quick Link Added Successfully!!');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $information = HomeStayVideo::find($id);
       $module = $this->module;

       return view('admin.home-stay-video.edit',
           compact('information',
                   'module'
                   )
       );
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
    $rules = [
        'link'=>'required',
        'status'=>'required',
        'order'=>'required'
       ];

    //    $msg = ['property_id.unique'=>'Property is already exists'];


       $request->validate($rules);


       $information = HomeStayVideo::find($id);
       $information->link = $request->link;
       $information->status = $request->status;
       $information->order = $request->order;
       $information->save();


       return redirect()
               ->route('home-stay-video.index')
               ->with('message','Home Stay Video Updated Successfully!!');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function delete(Request $request)
   {
       $id = $request->id;

       if($id){

           $informations = HomeStayVideo::whereIn('id',$request->id)->get();

           if($informations->isEmpty()==false){
               foreach ($informations as  $value) {
                   $value->delete();
               }

               return redirect()->route('home-stay-video.index')->with('error','Selected Link Are Unlisted From Featured List!!');
           }
       }


       return redirect()->route('home-stay-video.index')->with('error','No Link found to be deleted!');

   }
}
