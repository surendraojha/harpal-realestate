<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;

    public function __construct(){
        $this->module ='Local Area Facilities';
    }


    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;
        $informations= Feature::orderBy('order');


        if($keyword){
            $informations = $informations->where('title', 'like', '%' . $keyword . '%');
        }


        $informations = $informations->paginate(30);
        $module = $this->module;
        return view('admin.feature.index',
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
            'title'=>'required',
            // 'value'=>'required',
            'order'=>'required',
            'status'=>'required'
        ];

        $request->validate($rules);

        $information = new Feature();


        $information->title = $request->title;
        $information->value = $request->value;
        $information->order = $request->order;
        $information->status = $request->status;

        $information->save();

        return redirect()->route('feature.index')->with('message','Local Area Facility Added Successfully!!');




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
        $information = Feature::find($id);
        $module = $this->module;

        return view('admin.feature.edit',
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
            'title'=>'required',
            // 'value'=>'required',
            'order'=>'required',
            'status'=>'required'
        ];

        $request->validate($rules);

        $information = Feature::find($id);

        $information->title = $request->title;
        $information->value = $request->value;
        $information->order = $request->order;
        $information->status = $request->status;

        $information->save();

        return redirect()->route('feature.index')->with('message','Local Area Facility Updated Successfully!!');
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
            $informations = Feature::whereIn('id',$id)->get();


            if($informations->isEmpty()==false){
                foreach ($informations as  $value) {
                    $value->delete();
                }

            return redirect()->route('feaure.index')
            ->with('message','Local Area Facility Deleted Successfully!!');
            }
        }

              return redirect()->route('feaure.index')
            ->with('error','Selected Item Not Found or Already Deleted!!');

    }
}
