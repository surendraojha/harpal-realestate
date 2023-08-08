<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CustomerStory;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use File;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $profile = UserProfile::with('user')
                ->where('user_id',$user->id)
                ->first();
        if($user->role =='superadmin' || $user->role =='admin'){
            $informations = CustomerStory::orderBY('id','DESC')->get();


        }else{
            $informations = CustomerStory::where('user_id',$user->id)->orderBY('id','DESC')->get();

        }

        // dd($informations);
        return view('front.testimonials.index',
            compact('informations','user','profile')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        $profile = UserProfile::with('user')
        ->where('user_id',$user->id)
        ->first();
        return view('front.testimonials.create',
            compact('user','profile')
        );
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
            'message'=>'required|max:160'
        ];

        $request->validate($rules);

        $latest = CustomerStory::orderBy('order')->first();

        $user = auth()->user();

        $information = new CustomerStory();

        $information->name = $request->name;
        $information->activity = $request->activity;
        $information->rating = $request->rating;


        if($latest){
        $information->order = ((int) $latest->order) -1 ;

        }else{
            $information->order =1;
        }

        if($user->role =='superadmin' || $user->role =='admin'){
            $information->status = 1;

        }else{
            $information->status = 0;
        }

        $information->message = $request->message;

        if($request->hasFile('photo')){

           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;

        }

        $information->user_id = auth()->user()->id;

        $information->save();

        return redirect()->route('front-testimonial.index')
            ->with('message','Your Review Created Successfully!!');


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
        $information = CustomerStory::findOrFail($id);

        $user = auth()->user();


        $profile = UserProfile::with('user')
        ->where('user_id',$user->id)
        ->first();

        return view('front.testimonials.edit',
            compact('information','user','profile')
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
            'name'=>'required|max:30',
            'activity'=>'required|max:30',
            'rating'=> 'required',
            'message'=>'required|max:160'
        ];

        $request->validate($rules);
        $user = auth()->user();

        $information = CustomerStory::find($id);

        $information->name = $request->name;
        $information->activity = $request->activity;
        $information->rating = $request->rating;
        // $information->order = $request->order;

        if($user->role =='user'){

            $information->status = 0 ;

        }
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

        return redirect()->route('front-testimonial.index')
            ->with('message','Your Review Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {



        $information = CustomerStory::findOrFail($id);

            $old_path = public_path().'/uploads/'.$information->photo;

            if(File::exists($old_path)){
                File::delete($old_path);
            }
            $information->delete();


        return redirect()->route('front-testimonial.index')
                ->with('error','Your Review Deleted Successfully!!');
    }
}
