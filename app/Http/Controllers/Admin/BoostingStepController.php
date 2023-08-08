<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoostingStep;
use Illuminate\Http\Request;

class BoostingStepController extends Controller
{
    public function __construct(){
        $this->module = 'Promote Feature';
    }

    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;

        $informations = BoostingStep::orderBy('order');


        if($keyword){
            $informations = $informations->where('title', 'like', '%' . $keyword . '%');
        }


        $informations = $informations->paginate(30);

        $module = $this->module;
        return view('admin.boost-step.index',
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
        $rules = [
            'title'=>'required',
            'order'=>'required',
        ];

        $request->validate($rules);


        $information = new BoostingStep();

        $information->title = $request->title;
        $information->order = $request->order;

        $information->save();


        return redirect()
                ->route('boost-step.index')
                ->with('message','BoostingStep Created Successfully');


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
        $information = BoostingStep::find($id);
        $module = $this->module;

        return view('admin.boost-step.edit',
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
            'order'=>'required'
        ];

        $request->validate($rules);


        $information = BoostingStep::find($id);

        $information->title = $request->title;
        $information->order = $request->order;

        $information->save();


        return redirect()
                ->route('boost-step.index')
                ->with('message','BoostingStep Updated Successfully');
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
            $informations = BoostingStep::whereIn('id',$id)->get();










            foreach ($informations as $value) {
                $value->delete();
            }

            return redirect()->route('boost-step.index')
                    ->with('message','BoostingStep Deleted Successfully!!');
        }


        return redirect()->route('boost-step.index')
        ->with('error','Please Select Atleast one item for delete operation!!');

    }
}
