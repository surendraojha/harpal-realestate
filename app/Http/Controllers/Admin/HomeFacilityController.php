<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFacility;
use Illuminate\Http\Request;

class HomeFacilityController extends Controller
{
    public $module;

    public function __construct(){
        $this->module = 'Home Facility';
    }

    public function index()
    {


        $informations = HomeFacility::orderBy('order')->paginate(30);
        $module = $this->module;
        return view('admin.home-facility.index',
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


        $information = new HomeFacility();
        $information->title = $request->title;
        $information->order = $request->order;

        $information->save();

        return redirect()
                ->route('home-facility.index')
                ->with('message','home-facility Created Successfully!!');
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

        $information = HomeFacility::find($id);


        $module = $this->module;


        return view('admin.home-facility.edit',
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


        $information = HomeFacility::find($id);
        $information->title = $request->title;
        $information->order = $request->order;
        $information->save();

        return redirect()
                ->route('home-facility.index')
                ->with('message','home-facility Updated Successfully!!');
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
            $informations = HomeFacility::whereIn('id',$id)->get();


            // validate for property

            // $property = Property::whereIn('home-facility_id',$id)->count();

            // if($property>0){
            //     return redirect()->route('home-facility.index')
            //     ->with('error','Cannot perform delete operation. To delete This home-facility , Please Delete Related Property At First!!');
            // }

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $value->delete();
                }

            return redirect()->route('home-facility.index')->with('message','home-facility Deleted Successfully!!');
            }
        }



        return redirect()->route('home-facility.index')->with('error','Please Select Atleast one item!!');


    }
}
