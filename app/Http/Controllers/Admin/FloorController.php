<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Property;
use Illuminate\Http\Request;

class FloorController extends Controller
{

    public $module;

    public function __construct(){
        $this->module ='Floor';
    }


    public function index()
    {
        $informations= Floor::orderBy('order')->paginate(30);
        $module = $this->module;
        return view('admin.floor.index',
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
            // 'value'=>'required',
            'order'=>'required',
            'status'=>'required'
        ];

        $request->validate($rules);

        $information = new Floor();


        $information->title = $request->title;
        // $information->value = $request->value;
        $information->order = $request->order;
        $information->status = $request->status;

        $information->save();

        return redirect()->route('floor.index')->with('message','Feature Added Successfully!!');




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
        $information = Floor::find($id);
        $module = $this->module;

        return view('admin.floor.edit',
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

        $information = Floor::find($id);

        $information->title = $request->title;
        // $information->value = $request->value;
        $information->order = $request->order;
        $information->status = $request->status;

        $information->save();

        return redirect()->route('floor.index')->with('message','Floor Updated Successfully!!');
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
            $informations = Floor::whereIn('id',$id)->get();


                // validate for property

                $property = Property::whereIn('floor_id',$id)->count();

                if($property>0){
                    return redirect()->route('floor.index')
                    ->with('error','Cannot perform delete operation. To delete This Floor , Please Delete Related Property At First!!');
                }

            if($informations->isEmpty()==false){
                foreach ($informations as  $value) {
                    $value->delete();
                }

                return redirect()->route('floor.index')
                ->with('message','Floor Deleted Successfully!!');
            }
        }

        return redirect()->route('floor.index')
        ->with('error','Please Select Atleast one item for delete operation!!');

    }
}
