<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\RoadSize;
use Illuminate\Http\Request;

class RoadSizeController extends Controller
{
    public $module;

    public function __construct(){
        $this->module ='Road Type';
    }


    public function index()
    {


        $informations= RoadSize::orderBy('order')->paginate(30);
        $module = $this->module;
        return view('admin.road-size.index',
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

        $information = new RoadSize();


        $information->title = $request->title;
        // $information->value = $request->value;
        $information->order = $request->order;
        $information->status = $request->status;

        $information->save();

        return redirect()->route('road-size.index')->with('message','Road Size Added Successfully!!');




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
        $information = RoadSize::find($id);
        $module = $this->module;

        return view('admin.road-size.edit',
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

        $information = RoadSize::find($id);

        $information->title = $request->title;
        // $information->value = $request->value;
        $information->order = $request->order;
        $information->status = $request->status;

        $information->save();

        return redirect()->route('road-size.index')->with('message','Road Size Updated Successfully!!');
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
            $informations = RoadSize::whereIn('id',$id)->get();


            if($informations->isEmpty()==false){

                $property = Property::whereIn('road_size_id',$id)->count();

                if($property>0){
                    return redirect()->route('road-size.index')
                    ->with('error','Cannot perform delete operation. To delete This Road Size , Please Delete Related Property At First!!');
                }


                foreach ($informations as  $value) {
                    $value->delete();
                }


            return redirect()->route('road-size.index')
                ->with('message','Road Size Deleted Successfully!!');
            }

        }else{
            return redirect()->route('road-size.index')
            ->with('error','Please Select Atleast One Item!!');
        }

    }
}
