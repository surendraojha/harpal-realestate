<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Purpose;
use Illuminate\Http\Request;

class PurposeController extends Controller
{
    public $module;
    public function __construct()
    {
       $this->module = 'Purpose';
    }

   public function index(Request $request)
   {

       $informations = Purpose::orderBy('order')->paginate(50);

       $module = $this->module;

       $categories = Category::whereNull('parent')->pluck('title','id')->prepend('Select Option','');

       return view('admin.purpose.index',
           compact('informations',
                   'module',
                   'categories'
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
        'order'=>'required',
        'status'=>'required'
    ];
   $request->validate($rules);

   $information =new Purpose();
   $information->title = $request->title;
   $information->order = $request->order;
   $information->status = $request->status;

   $information->category_id = $request->category_id;
   $information->save();

       return redirect()
               ->route('purpose.index')
               ->with('message','Purpose Added Successfully!!');
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
       $information = Purpose::find($id);
       $module = $this->module;
       $categories = Category::whereNull('parent')->pluck('title','id')->prepend('Select Option','');

       return view('admin.purpose.edit',
           compact('information',
                   'module',
                   'categories'
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
            'order'=>'required',
            'status'=>'required'
        ];
       $request->validate($rules);

       $information = Purpose::find($id);
       $information->title = $request->title;
       $information->order = $request->order;
       $information->status = $request->status;
       $information->category_id = $request->category_id;
       $information->save();


       return redirect()
               ->route('purpose.index')
               ->with('message','Purpose Updated Successfully!!');
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

           $informations = Purpose::whereIn('id',$request->id)->get();

           if($informations->isEmpty()==false){
               foreach ($informations as  $value) {
                   $value->delete();
               }

               return redirect()->route('purpose.index')->with('message','Selected Properties Are Unlisted From Featured List!!');
           }
       }


       return redirect()->route('purpose.index')->with('error','No Item found to be deleted!');

   }
}
