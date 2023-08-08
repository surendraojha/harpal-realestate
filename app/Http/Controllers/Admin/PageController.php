<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class PageController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;
     public function __construct()
     {
        $this->module = 'Page';
     }
    public function index()
    {


        $informations = Page::orderBy('order')->paginate(50);
        $module = $this->module;
        return view('admin.page.index',
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
            'description'=>'required',
            'photo'=>'image',
            'order'=>'required',
            'status'=>'required'
        ];


        $request->validate($rules);

        $information = new Page();
        $information->title = $request->title;
        $information->slug = Str::slug($request->title);

        $information->description = $request->description;
        $information->order = $request->order;

        $information->subtitle = $request->subtitle;

        if($request->hasFile('photo'))
        {
           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;
        }
        $information->status = $request->status;
        $information->save();


        return redirect()->route('page.index')->with('message','page Added Successfully!!');
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
        $information = Page::find($id);
        $module = $this->module;

        return view('admin.page.edit',
            compact('information','module')
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
            'description'=>'required',
            'photo'=>'image',
            'order'=>'required',
            'status'=>'required'
        ];


        $request->validate($rules);

        $information = Page::find($id);
        $information->title = $request->title;
        $information->subtitle = $request->subtitle;

        $information->description = $request->description;
        $information->order = $request->order;
        $information->status = $request->status;
        if($request->hasFile('photo'))
        {
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


        return redirect()->route('page.index')->with('message','page Updated Successfully!!');
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
            $informations = Page::whereIn('id',$id)->get();

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $old_file = public_path().'/uploads/'.$value->photo;

                    if(File::exists($old_file)){
                        File::delete($old_file);
                    }

                    $value->delete();
                }

                return redirect()->route('page.index')
                        ->with('message','Selected pages deleted successfully !! ');
            }

        }


        return redirect()->route('page.index')
        ->with('error','No Selected pages Available !! ');
    }
}
