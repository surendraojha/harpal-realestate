<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuickLink;
use Illuminate\Http\Request;

class QuickLinkController extends Controller
{
    public $module;
    public function __construct()
    {
       $this->module = 'Quick Link';
    }

   public function index()
   {

       $informations = QuickLink::orderBy('order')->paginate(50);



       $module = $this->module;

       return view('admin.quick-link.index',
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
        'title'=>'required',
        'link'=>'required',
        'status'=>'required',
        'order'=>'required'
       ];

    //    $msg = ['property_id.unique'=>'Property is already exists'];


       $request->validate($rules);


       $information = new QuickLink();
       $information->title = $request->title;
       $information->link = $request->link;
       $information->status = $request->status;
       $information->order = $request->order;
       $information->save();


       return redirect()
               ->route('quick-link.index')
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
       $information = QuickLink::find($id);
       $module = $this->module;

       return view('admin.quick-link.edit',
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
        'title'=>'required',
        'link'=>'required',
        'status'=>'required',
        'order'=>'required'
       ];

    //    $msg = ['property_id.unique'=>'Property is already exists'];


       $request->validate($rules);


       $information = QuickLink::find($id);
       $information->title = $request->title;
       $information->link = $request->link;
       $information->status = $request->status;
       $information->order = $request->order;
       $information->save();


       return redirect()
               ->route('quick-link.index')
               ->with('message','Quick Link Updated Successfully!!');
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

           $informations = QuickLink::whereIn('id',$request->id)->get();

           if($informations->isEmpty()==false){
               foreach ($informations as  $value) {
                   $value->delete();
               }

               return redirect()->route('quick-link.index')->with('message','Selected Link Are Unlisted From Featured List!!');
           }
       }


       return redirect()->route('quick-link.index')->with('error','No Link found to be deleted!');

   }
}
