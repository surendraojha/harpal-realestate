<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerStory;
use Illuminate\Http\Request;
use File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->module = 'Customer Story';
    }
    public function index()
    {
        $informations = CustomerStory::orderBy('order')->paginate(30);
        $module = $this->module;
        return view('admin.testimonial.index',
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
            'photo'=>'image',
            'name'=>'required|max:30',
            'activity'=>'required|max:30',
            'rating'=> 'required',
            'order'=>'required',
            'status'=>'required',
            'message'=>'required|max:160'
        ];
        $request->validate($rules);


        $information = new CustomerStory();

        $information->name = $request->name;
        $information->activity = $request->activity;
        $information->rating = $request->rating;
        $information->order = $request->order;
        $information->status = $request->status;
        $information->message = $request->message;

        if($request->hasFile('photo')){

           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;
        }

        $information->save();

        return redirect()->route('testimonial.index')
            ->with('message','Customer Story Created Successfully!!');
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
        $information = CustomerStory::find($id);
        $module = $this->module;

        return view('admin.testimonial.edit',
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
            'photo'=>'image',
            'name'=>'required',
            'activity'=>'required|max:30',
            'rating'=> 'required',
            'order'=>'required',
            'status'=>'required',
            'message'=>'required|max:160'
        ];

        $request->validate($rules);

        $information = CustomerStory::find($id);

        $information->name = $request->name;
        $information->activity = $request->activity;
        $information->rating = $request->rating;
        $information->order = $request->order;
        $information->status = $request->status;
        $information->message = $request->message;


        if($request->hasFile('photo')){
            $old_file = public_path().'/uploads/'.$information->photo;

            if(File::exists($old_file)){
                File::delete($old_file);
            }

           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;
        }

        $information->save();

        return redirect()->route('testimonial.index')
            ->with('message','Customer Story Updated Successfully!!');
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

        $informations = CustomerStory::whereIn('id',$id)->get();

        if($informations->isEmpty()==false){
             foreach ($informations as $value) {
            $old_path = public_path().'/uploads/'.$value->photo;

            if(File::exists($old_path)){
                File::delete($old_path);
            }
            $value->delete();
        }

        return redirect()->route('testimonial.index')
                ->with('message','Selected Testimonial Deleted Successfully!!');
        }

              return redirect()->route('testimonial.index')
                ->with('error','Selected item not found or already deleted!!');

    }
}
