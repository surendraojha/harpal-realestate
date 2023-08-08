<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;

    public function __construct(){
        $this->module = 'Location';
    }

    public function index(Request $request)
    {
        $informations = Location::orderBy('order');

        $keyword = $request->keyword;

        if($keyword){
            $informations = $informations->where('location', 'like', '%' . $keyword . '%');
        }

        $module = $this->module;
        $informations = $informations->paginate(30);
        return view('admin.location.index',
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
            'location'=>'required|unique:locations',
            'order'=>'required',
            'status'=>'required'
        ];

        $request->validate($rules);


        $information = new Location();
        $information->location = $request->location;
        $information->order = $request->order;
        $information->status = $request->status;
        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;
        $information->save();

        return redirect()
                ->route('location.index')
                ->with('message','Location Created Successfully!!');
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

        $information = Location::find($id);


        $module = $this->module;


        return view('admin.location.edit',
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
            'location'=>'required|unique:locations,location,'.$id,
            'status'=>'required'
        ];

        $request->validate($rules);


        $information = Location::find($id);
        $information->location = $request->location;
        $information->order = $request->order;
        $information->status = $request->status;
        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;

        $information->save();

        return redirect()
                ->route('location.index')
                ->with('message','Location Updated Successfully!!');
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
            $informations = Location::whereIn('id',$id)->get();


            // validate for property

            $property = Property::whereIn('location_id',$id)->count();

            if($property>0){
                return redirect()->route('location.index')
                ->with('error','Cannot perform delete operation. To delete This Location , Please Delete Related Property At First!!');
            }

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $value->delete();
                }

            return redirect()->route('location.index')->with('back','Location Deleted Successfully!!');
            }
        }



        return redirect()->route('location.index')->with('error','Please Select Atleast one item!!');


    }


}
