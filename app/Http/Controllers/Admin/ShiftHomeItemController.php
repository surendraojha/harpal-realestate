<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShiftHomeItem;
use Illuminate\Http\Request;

class ShiftHomeItemController extends Controller
{
    public $module;

    public function __construct(){
        $this->module = 'Shift Home Item';
    }

    public function index()
    {


        $informations = ShiftHomeItem::orderBy('order')->paginate(30);
        $module = $this->module;
        return view('admin.shift-home-item.index',
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
            'title'=>'required|unique:shift_home_items,title',
            'order'=>'required',
            'status'=>'required'

        ];

        $request->validate($rules);


        $information = new ShiftHomeItem();
        $information->title = $request->title;
        $information->order = $request->order;
        $information->status = $request->status;
        $information->save();

        return redirect()
                ->route('shift-home-item.index')
                ->with('message','shift-home-item Created Successfully!!');
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

        $information = ShiftHomeItem::find($id);


        $module = $this->module;


        return view('admin.shift-home-item.edit',
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

            'title'=>'required|unique:shift_home_items,title,'.$id,
            'order'=>'required',
            'status'=>'required'

        ];

        $request->validate($rules);


        $information = ShiftHomeItem::find($id);
        $information->title = $request->title;
        $information->order = $request->order;
        $information->status = $request->status;

        $information->save();

        return redirect()
                ->route('shift-home-item.index')
                ->with('message','Shift Home Item Updated Successfully!!');
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
            $informations = ShiftHomeItem::whereIn('id',$id)->get();


            // validate for property

            // $property = Property::whereIn('shift-home-item_id',$id)->count();

            // if($property>0){
            //     return redirect()->route('shift-home-item.index')
            //     ->with('error','Cannot perform delete operation. To delete This shift-home-item , Please Delete Related Property At First!!');
            // }

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $value->delete();
                }

            return redirect()->route('shift-home-item.index')->with('message','Shift Home Item Deleted Successfully!!');
            }
        }



        return redirect()->route('shift-home-item.index')->with('error','Please Select Atleast one item!!');


    }
}
