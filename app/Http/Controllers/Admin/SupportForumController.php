<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportForum;
use Illuminate\Http\Request;

class SupportForumController extends Controller
{
    public function __construct(){
        $this->module = 'Support Forum';
    }

    public function index(Request $request)
    {



        $informations = SupportForum::orderBy('id','DESC');

        $property_id = $request->get('property_id');

        if($property_id){
            $informations = $informations->where('property_id',$property_id);
        }


        $informations = $informations->whereNull('parent')
                        ->paginate(30);

        $module = $this->module;

        return view('admin.support-forum.index',
            compact(
                'informations',
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
            'comment'=>'required',
            'parent'=>'required'
        ];

        $request->validate($rules);
        $information = new SupportForum();
        $information->user_id = auth()->user()->id;
        $information->comment = $request->comment;
        $information->parent = $request->parent;
        $information->save();

        return redirect()->back()->with('message','Message Reply Sent Successfully!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = SupportForum::find($id);
        $informations = SupportForum::where('parent',$id)->paginate(10);
        $module = $this->module.'-replies';
        return view('admin.support-forum.show',
            compact('information','informations','module')
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


     public function destroy($id){
         $information = SupportForum::findorfail($id);
         $information->delete();

         return redirect()->back()->with('error','Reply Deleted Successfully!!');
     }
    public function delete(Request $request)
    {
        $id = $request->id;


        if($id){


            $informations = SupportForum::whereIn('id',$id)->get();

            // check for ppropoerty

            if($informations->isEmpty()==false){

                foreach ($informations as  $value) {
                    $value->delete();
                }
                return redirect()
                ->back()
                ->with('message','Support Forum Deleted Successfully!!');
            }





        }


        return redirect()->back()
        ->with('error','Please Select Atleast one item for delete operation!!');
    }
}
