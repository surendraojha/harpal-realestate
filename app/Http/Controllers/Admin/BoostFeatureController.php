<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoostFeature;
use Illuminate\Http\Request;

class BoostFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->module = 'Boost Feature';
    }

    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;

        $informations = BoostFeature::orderBy('order');


        if($keyword){
            $informations = $informations->where('title', 'like', '%' . $keyword . '%');
        }


        $informations = $informations->paginate(30);

        $module = $this->module;
        return view('admin.boost-feature.index',
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


        $information = new BoostFeature();

        $information->title = $request->title;
        $information->order = $request->order;

        $information->save();


        return redirect()
                ->route('boost-feature.index')
                ->with('message','BoostFeature Created Successfully');


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
        $information = BoostFeature::find($id);
        $module = $this->module;

        return view('admin.boost-feature.edit',
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


        $information = BoostFeature::find($id);

        $information->title = $request->title;
        $information->order = $request->order;

        $information->save();


        return redirect()
                ->route('boost-feature.index')
                ->with('message','BoostFeature Updated Successfully');
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
            $informations = BoostFeature::whereIn('id',$id)->get();










            foreach ($informations as $value) {
                $value->delete();
            }

            return redirect()->route('boost-feature.index')
                    ->with('message','BoostFeature Deleted Successfully!!');
        }


        return redirect()->route('boost-feature.index')
        ->with('error','Please Select Atleast one item for delete operation!!');

    }
}
