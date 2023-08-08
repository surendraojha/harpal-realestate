<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{

    public function __construct(){
        $this->module = 'Category';
    }

    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;

        $informations = Category::orderBy('order')->where('depth',2);

        if($keyword){
            $informations = $informations->where('title', 'like', '%' . $keyword . '%');
        }


        $informations = $informations->paginate(30);
        $categories = Category::where('depth',1)->pluck('title','id');
        $module = $this->module;
        return view('admin.sub-category.index',
            compact(
                'informations',
                'module',
                'categories',
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
            'status'=>'required',
            'parent'=>'required'
        ];

        $request->validate($rules);


        $information = new Category();

        $information->title = $request->title;
        $information->slug = Str::slug($request->title).'-KB'.date('ymdhis');

        $information->depth = 2;
        $information->order = $request->order;
        $information->status = $request->status;
        $information->parent = $request->parent;

        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;
        $information->save();


        return redirect()
                ->route('sub-category.index')
                ->with('message','Sub-Category Created Successfully');


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
        $categories = Category::where('depth',1)->pluck('title','id');

        return view('admin.sub-category.edit',
            compact('information',
                'module',
                'categories'
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
            'title'=>'required',
            'order'=>'required',
            'status'=>'required',
            'parent'=>'required'

        ];

        $request->validate($rules);


        $information = Category::find($id);

        $information->title = $request->title;
        if($request->slug){
            $information->slug = $request->slug;
        }else{
            $information->slug = Str::slug($request->title).'-KB'.date('ymdhis');

        }
        $information->depth =2;
        $information->order = $request->order;
        $information->status = $request->status;
        $information->parent = $request->parent;
        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;
        $information->save();


        return redirect()->route('sub-category.index')
                ->with('message','Sub-category Updated Successfully');
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

            $informations = Category::whereIn('id',$id)->get();
            if($informations->isEmpty() == false){
            // check for ppropoerty

                $property = Property::whereIn('sub_category_id',$id)->count();

                if($property>0){
                    return redirect()->route('sub-category.index')
                    ->with('error','Cannot perform delete operation. To delete This Sub Category , Please Delete Related Property At First!!');
                }

                foreach($informations as $information){
                    $information->delete();
                }





                return redirect()
                        ->route('sub-category.index')
                        ->with('message','Sub Category Deleted Successfully!!');
            }
        }


        return redirect()->route('sub-category.index')
        ->with('error','Please Select Atleast one item for delete operation!!');
    }
}
