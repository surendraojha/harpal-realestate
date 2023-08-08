<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\Property;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;

    public function __construct()
    {
        $this->module="FAQs";
    }
    public function index()
    {
        $informations = FAQ::orderBy('id')->paginate(50);
        $module = $this->module;

        $properties = Property::pluck('title','id');


        return view('admin.faq.index',
            compact('informations','module','properties')
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
            'question'=>'required',
            'answer'=>'required',
            'order'=>'required'
        ];
        $request->validate($rules);
        $information = new FAQ();

        if($request->property_id){
            $information->property_id = $request->property_id;

        }
        $information->question = $request->question;
        $information->answer = $request->answer;
        if($request->featured){
            $information->featured = $request->featured;

        }
        if($request->status){
            $information->status = $request->status;

        }
        $information->order = $request->order;

        $information->save();

        if($request->property_id){
            return redirect()->route('faq.show',$request->property_id)->with('message','FAQ Added Successfully!!');
        }


        return redirect()->route('faq.index')->with('message','FAQ Added Successfully!!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $information = Property::find($id);
        $informations = FAQ::where('property_id',$id)->paginate(50);
        $properties = Property::pluck('title','id');

        $module = $information->title.'-'.$this->module;
        return view('admin.faq.index',
            compact('informations',
                    'properties',
                    'module'
            )
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

        $information = FAQ::find($id);

        $properties = Property::pluck('title','id');

        $module = $this->module;

        return view('admin.faq.edit',
            compact('information','properties','module')
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
            'question'=>'required',
            'answer'=>'required',
            'order'=>'required'

        ];
        $request->validate($rules);
        $information = FAQ::find($id);

        if($request->property_id){
            $information->property_id = $request->property_id;

        }else{
            $information->property_id =null;
        }

        $information->question = $request->question;
        $information->answer = $request->answer;
        if($request->featured){
            $information->featured = $request->featured;

        }else{
            $information->featured =0;
        }
        if($request->status){
            $information->status = $request->status;

        }else{
            $information->status =0;
        }

        $information->order = $request->order;
        $information->save();

        if($request->property_id){
            return redirect()->route('faq.show',$request->property_id)->with('message','FAQ Updated Successfully!!');
        }


        return redirect()->route('faq.index')->with('message','FAQ Updated Successfully!!');


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
            $informations = FAQ::whereIn('id',$id)->get();


            if($informations->isEmpty()==false){
                foreach ($informations as  $value) {
                    $value->delete();
                }

            return redirect()->route('faq.index')
            ->with('message','FAQ Deleted Successfully!!');
            }
        }

        return redirect()->route('faq.index')
            ->with('error','Selected Item Not Found or Already Deleted!!');

    }
}
