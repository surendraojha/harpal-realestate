<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoostPost;
use App\Models\Property;
use Illuminate\Http\Request;
use File;
class BoostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->module = 'Boost Request';
    }

    public function index(Request $request)
    {

        $keyword = $request->keyword;



        $informations = BoostPost::orderBy('created_at','DESC');



        if($keyword){
            // property_id
		    // message
		    // name
		    // email
		    // phone

            $properties = Property::where('ad_id', 'like', '%' . $keyword . '%')->pluck('id','id')->toArray();

            if(count($properties)>0){



            $informations = $informations->where(function ($query) use ($keyword,$properties){
                $query->where('name', 'like', '%' . $keyword . '%')
                      ->orWhere('email', 'like', '%' . $keyword . '%')
                      ->orWhere('phone', 'like', '%' . $keyword . '%')
                      ->orWhereIn('property_id',$properties);
            });

        }else{
            $informations = $informations->where(function ($query) use ($keyword){
                $query->where('name', 'like', '%' . $keyword . '%')
                      ->orWhere('email', 'like', '%' . $keyword . '%')
                      ->orWhere('phone', 'like', '%' . $keyword . '%');
            });
        }




        }

        $informations = $informations->paginate(30);

        $module = $this->module;

        return view('admin.boost-request.index',
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



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = BoostPost::findorFail($id);

        if($information->status==0){
            $information->status = 1;
            $alert_type = 'message';
            $msg ='Boost Approved Successfully!!';

        }else{
            $information->status=0;

            $alert_type = 'error';
            $msg ='Boost Marked Pending Successfully!!';
        }

        $information->save();

        return redirect()->back()->with($alert_type,$msg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = $this->module;
        $information = BoostPost::findorFail($id);

        return view('admin.boost-request.show',compact('information','module'));

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
            $informations = BoostPost::whereIn('id',$id)->get();



            foreach ($informations as $value) {

                $path = public_path().'/uploads/'.$value->deposit_slip;

                if(File::exists($path)){
                    File::delete($path);
                }
                $value->delete();
            }

            return redirect()->back()
                    ->with('message','Boost Post Deleted Successfully!!');
        }


        return redirect()->back()
        ->with('error','Please Select Atleast one item for delete operation!!');

    }
}
