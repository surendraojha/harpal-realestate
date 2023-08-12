<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;
     public function __construct()
     {
        $this->module = 'Blog Category';
     }
    public function index()
    {


        $informations = BlogCategory::orderBy('id','DESC')->paginate(50);
        $module = $this->module;
        return view('admin.blog-category.index',
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
            'photo'=>'image'
        ];


        $request->validate($rules);

        $information = new BlogCategory();
        $information->title = $request->title;
        $information->slug = Str::slug($request->title);
        if($request->hasFile('photo'))
        {
           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/blog-categorys/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;
        }
        $information->save();


        return redirect()->route('blog-category.index')->with('message','blog-category Added Successfully!!');
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
        $information = BlogCategory::findOrfail($id);
        $module = $this->module;

        return view('admin.blog-category.edit',
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
            'photo'=>'image'
        ];


        $request->validate($rules);

        $information =  BlogCategory::findOrfail($id);
        $information->title = $request->title;




        if($request->hasFile('photo'))
        {
            $old_file = public_path().'/blog-categorys/'.$information->photo;


            if(File::exists($old_file)){
                File::delete($old_file);
            }
           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/blog-categorys/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;
        }
        $information->save();


        return redirect()->route('blog-category.index')->with('message','blog-category Updated Successfully!!');
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
            $informations = BlogCategory::whereIn('id',$id)->get();

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $old_file = public_path().'/blog-categorys/'.$value->photo;

                    if(File::exists($old_file)){
                        File::delete($old_file);
                    }

                    $value->delete();
                }

                return redirect()->route('blog-category.index')
                        ->with('message','Selected blog-categorys deleted successfully !! ');
            }

        }


        return redirect()->route('blog-category.index')
        ->with('error','No Selected blog-categorys Available !! ');
    }
}
