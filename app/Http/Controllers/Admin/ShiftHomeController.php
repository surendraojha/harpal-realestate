<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShiftHome;
use Illuminate\Http\Request;

class ShiftHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;

    public function __construct(){
        $this->module = 'Shift Home';
    }

    public function index(Request $request)
    {
        $informations = ShiftHome::orderBy('id','DESC');



     $keyword = $request->keyword;

            if($keyword){


                $informations =  $informations ->where(function($q) use ($keyword){
                $q->where('type', 'like', '%' . $keyword . '%')
                  ->orwhere('pick_up_location', 'like', '%' . $keyword . '%')
                  ->orwhere('drop_off_location', 'like', '%' . $keyword . '%')
                  ->orwhere('phone', 'like', '%' . $keyword . '%')
                  ->orwhere('when', 'like', '%' . $keyword . '%')
                  ->orwhere('items', 'like', '%' . $keyword . '%');

            });

        }
        $informations = $informations->paginate(20);

        $module = $this->module;
        return view('admin.shift-home.index',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){


        $information = ShiftHome::findorfail($id);
        $module = $this->module;

        return view('admin.shift-home.show',
            compact('information','module')
        );


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $informations = ShiftHome::whereIn('id',$request->id)->get();

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $value->delete();
                }

                return redirect()
                        ->route('shift-home.index')
                        ->with('message','Selected Shift Deleted Successfully!!!');
            }
        }


        return redirect()
        ->route('shift-home.index')
        ->with('error','Can not perform delete operation because selected item not found or empty');
    }

    public function changeRead($id){
        $information = ShiftHome::findorFail($id);

        if($information->read==0){
            $information->read =1;


            $alert = 'message';
            $message = 'Marked As Done Successfully!!';
        }else{
            $information->read =0;
            $alert = 'error';
            $message = 'Marked As Not Done Successfully!!';
        }

        $information->save();

        return redirect()->back()->with($alert,$message);


    }
}
