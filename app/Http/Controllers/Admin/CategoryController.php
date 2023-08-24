<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;
    public function __construct()
    {
        $this->module = 'Main Category';
    }

    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;
        $informations = Category::orderBy('order')->where('depth', 1);


        if ($keyword) {
            $informations = $informations->where('title', 'like', '%' . $keyword . '%');
        }


        $informations = $informations->paginate(30);

        $module = $this->module;
        return view(
            'admin.category.index',
            compact(
                'informations',
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
            'title' => 'required',
            'order' => 'required',
            // 'status'=>'required'
        ];

        $request->validate($rules);


        $information = new Category();

        $information->title = $request->title;
        $information->slug = Str::slug($request->title) . '-KB' . date('ymdhis');
        $information->depth = 1;
        $information->order = $request->order;
        $information->status = $request->status ?? 1;

        if ($request->hasFile('photo')) {
            $old_file = public_path() . '/category/' . $information->photo;


            if (File::exists($old_file)) {
                File::delete($old_file);
            }
            $file = $request->file('photo');
            $extension = '.' . $request->file('photo')->extension();
            $path = public_path() . '/category/';
            $filename = date('ymdhis') . $extension;
            $file->move($path, $filename);
            $information->photo = $filename;
        }

        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;

        $arr=[];
        if($request->identifier){
            for ($i=0; $i < count($request->identifier) ; $i++) {
                $a=[];
                $a['identifier'] = $request->identifier[$i];
                $a['label'] = $request->label[$i];
                $a['required'] = $request->required[$i];
                $arr[]=$a;
            }
        }

        $information->custom_fields = json_encode($arr);

        $information->save();




        return redirect()
            ->route('category.index')
            ->with('message', 'Category Created Successfully');
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
        $information = Category::find($id);


        $module = $this->module;

        return view('admin.category.edit',
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
            'title' => 'required',
            'order' => 'required',
            // 'status'=>'required'
        ];

        $request->validate($rules);


        $information = Category::findorfail($id);

        if ($request->hasFile('photo')) {
            $old_file = public_path() . '/category/' . $information->photo;


            if (File::exists($old_file)) {
                File::delete($old_file);
            }
            $file = $request->file('photo');
            $extension = '.' . $request->file('photo')->extension();
            $path = public_path() . '/category/';
            $filename = date('ymdhis') . $extension;
            $file->move($path, $filename);
            $information->photo = $filename;
        }
        $information->title = $request->title;
        $information->order = $request->order ?? 1;
        $information->status = $request->status ?? 1;
        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;

        $arr=[];
        if($request->identifier){
            for ($i=0; $i < count($request->identifier) ; $i++) {
                $a=[];
                $a['identifier'] = $request->identifier[$i];
                $a['label'] = $request->label[$i];
                $a['required'] = $request->required[$i];
                $arr[]=$a;
            }
        }

        $information->custom_fields = json_encode($arr);
        $information->save();


        return redirect()
            ->route('category.index')
            ->with('message', 'Category Updated Successfully');
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




        return redirect()->route('category.index')
            ->with('error', 'Cannot Delete Category!!');
    }
}
