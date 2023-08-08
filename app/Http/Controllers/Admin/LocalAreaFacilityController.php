<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LocalAreaFacility;
use Illuminate\Http\Request;

class LocalAreaFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;

    public function __construct(){
        $this->module = 'Local Area Facility';
    }

    public function index()
    {


        $informations = LocalAreaFacility::orderBy('order')->paginate(30);
        $module = $this->module;
        return view('admin.local-area-facility.index',
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
            'title'=>'required|unique:local_area_facilities,title',
            'order'=>'required'
        ];

        $request->validate($rules);


        $information = new LocalAreaFacility();
        $information->title = $request->title;
        $information->order = $request->order;

        $information->save();

        return redirect()
                ->route('local-area-facility.index')
                ->with('message','local-area-facility Created Successfully!!');
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

        $information = LocalAreaFacility::find($id);


        $module = $this->module;


        return view('admin.local-area-facility.edit',
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

            'title'=>'required|unique:local_area_facilities,title,'.$id,
            'order'=>'required'

        ];

        $request->validate($rules);


        $information = LocalAreaFacility::find($id);
        $information->title = $request->title;
        $information->order = $request->order;
        $information->save();

        return redirect()
                ->route('local-area-facility.index')
                ->with('message','local-area-facility Updated Successfully!!');
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
            $informations = LocalAreaFacility::whereIn('id',$id)->get();


            // validate for property

            // $property = Property::whereIn('local-area-facility_id',$id)->count();

            // if($property>0){
            //     return redirect()->route('local-area-facility.index')
            //     ->with('error','Cannot perform delete operation. To delete This local-area-facility , Please Delete Related Property At First!!');
            // }

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $value->delete();
                }

            return redirect()->back()->with('message','local-area-facility Deleted Successfully!!');
            }
        }



        return redirect()->back()->with('error','Please Select Atleast one item!!');


    }
}
