<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\RecommendedProperty;
use Illuminate\Http\Request;

class RecommendedPropertyController extends Controller
{
    public $module;
    public function __construct()
    {
       $this->module = 'Recommended Property';
    }

   public function index()
   {

       $informations = RecommendedProperty::with('property')->orderBy('order')->paginate(50);


       $properties = Property::orderBy('ad_id')->pluck('ad_id','id');

       $module = $this->module;

       return view('admin.recommended-property.index',
           compact('informations',
                   'properties',
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
        'property_id'=>'required|unique:recommended_properties,property_id',
        'order'=>'required'
       ];

       $msg = ['property_id.unique'=>'Property is already exists'];


       $request->validate($rules,$msg);


       $information = new RecommendedProperty();
       $information->property_id = $request->property_id;
       $information->order = $request->order;
       $information->save();


       return redirect()
               ->route('recommended-property.index')
               ->with('message','Featured Property Added Successfully!!');
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
       $information = RecommendedProperty::find($id);
       $properties = Property::orderBy('ad_id')->pluck('ad_id','id');
       $module = $this->module;

       return view('admin.recommended-property.edit',
           compact('information',
                   'properties',
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
           'property_id'=>'required|unique:recommended_properties,property_id,'.$id,
           'order'=>'required'
       ];


       $msg = ['property_id.unique'=>'Property is already exists'];


       $request->validate($rules,$msg);




       $information = RecommendedProperty::find($id);
       $information->property_id = $request->property_id;
       $information->order = $request->order;
       $information->save();


       return redirect()
               ->route('recommended-property.index')
               ->with('message','Featured Property Updated Successfully!!');
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

           $informations = RecommendedProperty::whereIn('id',$request->id)->get();

           if($informations->isEmpty()==false){
               foreach ($informations as  $value) {
                   $value->delete();
               }

               return redirect()->route('recommended-property.index')->with('message','Selected Properties Are Unlisted From Featured List!!');
           }
       }


       return redirect()->route('recommended-property.index')->with('error','No property found to be deleted!');

   }
}
