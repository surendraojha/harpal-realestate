<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FamilyWelcome;
use Illuminate\Http\Request;

class FamilyWelcomeController extends Controller
{
    public $module;

    public function __construct(){
        $this->module = 'Family Welcome';
    }

    public function index()
    {


        $informations = FamilyWelcome::orderBy('order')->paginate(30);
        $module = $this->module;
        return view('admin.family-welcome.index',
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
            'title'=>'required|unique:family_welcomes,title',
            'order'=>'required'
        ];

        $request->validate($rules);


        $information = new FamilyWelcome();
        $information->title = $request->title;
        $information->order = $request->order;

        $information->save();

        return redirect()
                ->route('family-welcome.index')
                ->with('message','family-welcome Created Successfully!!');
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

        $information = FamilyWelcome::find($id);


        $module = $this->module;


        return view('admin.family-welcome.edit',
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

            'title'=>'required|unique:family_welcomes,title,'.$id,
            'order'=>'required'

        ];

        $request->validate($rules);


        $information = FamilyWelcome::find($id);
        $information->title = $request->title;
        $information->order = $request->order;
        $information->save();

        return redirect()
                ->route('family-welcome.index')
                ->with('message','family-welcome Updated Successfully!!');
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
            $informations = FamilyWelcome::whereIn('id',$id)->get();


            // validate for property

            // $property = Property::whereIn('family-welcome_id',$id)->count();

            // if($property>0){
            //     return redirect()->route('family-welcome.index')
            //     ->with('error','Cannot perform delete operation. To delete This family-welcome , Please Delete Related Property At First!!');
            // }

            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $value->delete();
                }

            return redirect()->route('family-welcome.index')->with('message','family-welcome Deleted Successfully!!');
            }
        }



        return redirect()->route('family-welcome.index')->with('error','Please Select Atleast one item!!');


    }
}
