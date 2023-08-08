<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use File;
class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;
     public function __construct()
     {
        $this->module = 'Partner';
     }
    public function index()
    {
        $informations = Partner::orderBy('order')->paginate(50);
        $module = $this->module;
        return view('admin.partner.index',
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
            'photo'=>'required|image',
            'link'=>'required',
            'order'=>'required',
            'status'=>'required'
        ];


        $request->validate($rules);

        $information = new Partner();
        $information->link = $request->link;
        $information->order = $request->order;
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


        return redirect()->route('partner.index')->with('message','Partner Added Successfully!!');
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
        $information = Partner::find($id);
        $module = $this->module;

        return view('admin.partner.edit',
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
            'photo'=>'image',
            'link'=>'required',
            'order'=>'required',
            'status'=>'required'
        ];


        $request->validate($rules);

        $information = Partner::find($id);
        $information->link = $request->link;
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


        return redirect()->route('partner.index')->with('message','Partner Updated Successfully!!');
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
            $informations = Partner::whereIn('id',$id)->get();

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $old_file = public_path().'/uploads/'.$value->photo;

                    if(File::exists($old_file)){
                        File::delete($old_file);
                    }

                    $value->delete();
                }

                return redirect()->route('partner.index')
                        ->with('message','Selected partners deleted successfully !! ');
            }

        }


        return redirect()->route('partner.index')
        ->with('error','No Selected partners Available !! ');
    }
}
