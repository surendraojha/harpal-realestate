<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;
    public function __construct(){
        $this->module = 'Blogs';
     }
    public function index()
    {


        $informations = Blog::orderBy('id','DESC')->paginate(50);
        $categories = BlogCategory::orderBy('title')->get();
        $module = $this->module;
        return view('admin.blog.index',
            compact('informations',
                    'categories',
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
            'category_id'=>'required',
            'writer_name'=>'required',
            'photo'=>'image'
        ];


        $request->validate($rules,[],['category_id'=>'Category']);

        $information = new Blog();
        $information->title = $request->title;
        $information->slug = Str::slug($request->title);
        $information->writer_name = $request->writer_name;
        $information->category_id = $request->category_id;


        $information->description = $request->description;
        $information->user_id = auth()->user()->id;

        if($request->hasFile('photo'))
        {
           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/blogs/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;
        }
        $information->save();


        return redirect()->route('blog.index')->with('message','Blog Added Successfully!!');
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
        $information = Blog::findOrfail($id);
        $categories = BlogCategory::orderBy('title')->get();

        $module = $this->module;

        return view('admin.blog.edit',
            compact('information','module','categories')
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
            'category_id'=>'required',
            'writer_name'=>'required',
            'photo'=>'image'
        ];


        $request->validate($rules,[],['category_id'=>'Category']);

        $information =  Blog::findOrfail($id);
        $information->title = $request->title;
        $information->category_id = $request->category_id;

        $information->writer_name = $request->writer_name;
        $information->description = $request->description;




        if($request->hasFile('photo'))
        {
            $old_file = public_path().'/blogs/'.$information->photo;


            if(File::exists($old_file)){
                File::delete($old_file);
            }
           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/blogs/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;
        }
        $information->save();


        return redirect()->route('blog.index')->with('message','Blog Updated Successfully!!');
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
            $informations = Blog::whereIn('id',$id)->get();

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $old_file = public_path().'/blogs/'.$value->photo;

                    if(File::exists($old_file)){
                        File::delete($old_file);
                    }

                    $value->delete();
                }

                return redirect()->route('blog.index')
                        ->with('message','Selected blogs deleted successfully !! ');
            }

        }


        return redirect()->route('blog.index')
        ->with('error','No Selected blogs Available !! ');
    }
}
