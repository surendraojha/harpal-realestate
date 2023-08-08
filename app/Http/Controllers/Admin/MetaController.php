<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use Illuminate\Http\Request;
use File;
class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;

    public function __construct(){
        $this->module = 'Meta Tags';
    }

    public function index(Request $request)
    {


        $informations = Meta::orderBy('meta_title');

        $keyword = $request->keyword;

        if($keyword){
            $informations = $informations->where('module', 'like', '%' . $keyword . '%');
        }

        $module = $this->module;
        $informations = $informations->paginate(30);

        return view('admin.meta-tag.index',
            compact('informations',
                'module',
                'keyword'
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
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'photo'=>'mimes:jpg,jpeg,png,gif,tiff,svg',
            'module'=>'required|unique:metas,module,'

        ];

        $request->validate($rules);


        $information = new Meta();
        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;
        $information->module = $request->module;

        if($request->hasFile('photo'))
        {
           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;
        }
        $information->save();

        return redirect()
                ->route('meta-tag.index')
                ->with('message','Meta Tag Created Successfully!!');
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

        $information = Meta::find($id);


        $module = $this->module;


        return view('admin.meta-tag.edit',
            compact(
                'information',
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
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'photo'=>'mimes:jpg,jpeg,png,gif,tiff,svg',
            'module'=>'required|unique:metas,module,'.$id
        ];

        $request->validate($rules);


        $information = Meta::findorfail($id);
        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;
        $information->module = $request->module;
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

        return redirect()
                ->route('meta-tag.index')
                ->with('message','Meta Tag Updated Successfully!!');
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

            $informations = Meta::whereIn('id',$id)->get();


            // validate for property



            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                     $old_file = public_path().'/uploads/'.$value->photo;


            if(File::exists($old_file)){
                File::delete($old_file);
            }
                    $value->delete();
                }

            return redirect()->route('meta-tag.index')->with('back','Meta Tag Deleted Successfully!!');
            }
        }



        return redirect()->route('meta-tag.index')->with('error','Please Select Atleast one item!!');


    }
}
