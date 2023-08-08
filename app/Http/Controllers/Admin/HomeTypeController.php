<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeType;
use Illuminate\Http\Request;

class HomeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;

    public function __construct(){
        $this->module = 'Home Type';
    }

    public function index()
    {


        $informations = HomeType::orderBy('order')->paginate(30);
        $module = $this->module;
        return view('admin.home-type.index',
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
            'title'=>'required|unique:home_types,title',
            'order'=>'required'
        ];

        $request->validate($rules);


        $information = new HomeType();
        $information->title = $request->title;
        $information->order = $request->order;

        $information->save();

        return redirect()
                ->route('home-type.index')
                ->with('message','home-type Created Successfully!!');
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

        $information = HomeType::find($id);


        $module = $this->module;


        return view('admin.home-type.edit',
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

        // dd('here');
        $rules = [

            'title'=>'required|unique:home_types,title,'.$id,
            'order'=>'required'

        ];

        $request->validate($rules);


        $information = HomeType::find($id);
        $information->title = $request->title;
        $information->order = $request->order;
        $information->save();

        return redirect()
                ->route('home-type.index')
                ->with('message','home-type Updated Successfully!!');
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
            $informations = HomeType::whereIn('id',$id)->get();


            // validate for property

            // $property = Property::whereIn('home-type_id',$id)->count();

            // if($property>0){
            //     return redirect()->route('home-type.index')
            //     ->with('error','Cannot perform delete operation. To delete This home-type , Please Delete Related Property At First!!');
            // }

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $value->delete();
                }

            return redirect()->route('home-type.index')->with('error','home-type Deleted Successfully!!');
            }
        }



        return redirect()->route('home-type.index')->with('error','Please Select Atleast one item!!');


    }
}
