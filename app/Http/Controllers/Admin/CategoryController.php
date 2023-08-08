<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->module = 'Rental Type';
    }

    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;
        $informations = Category::orderBy('order')->where('depth',1);


        if($keyword){
            $informations = $informations->where('title', 'like', '%' . $keyword . '%');
        }


        $informations = $informations->paginate(30);

        $module = $this->module;
        return view('admin.category.index',
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
            'title'=>'required',
            'order'=>'required',
            'status'=>'required'
        ];

        $request->validate($rules);


        $information = new Category();

        $information->title = $request->title;
        $information->slug = Str::slug($request->title).'-KB'.date('ymdhis');
        $information->depth = 1;
        $information->order = $request->order;
        $information->status = $request->status;

           $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;

        $information->save();


        return redirect()
                ->route('category.index')
                ->with('message','Category Created Successfully');


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
        // $rules = [
        //     'title'=>'required',
        //     'order'=>'required',
        //     'status'=>'required'
        // ];

        // $request->validate($rules);


        $information = Category::findorfail($id);


        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;
        $information->save();


        return redirect()
                ->route('category.index')
                ->with('message','Category Updated Successfully');
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
        ->with('error','Cannot Delete Category!!');

    }
}
