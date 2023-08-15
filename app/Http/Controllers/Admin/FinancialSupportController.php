<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\FinancialSupport;
use Illuminate\Http\Request;

class FinancialSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;

    public function __construct(){
        $this->module ='Financial Support';
    }


    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;
        $informations= FinancialSupport::orderBy('order');


        if($keyword){
            $informations = $informations->where('title', 'like', '%' . $keyword . '%');
        }


        $informations = $informations->paginate(30);
        $module = $this->module;
        return view('admin.financial-support.index',
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
            'photo'=>'mimes:jpg,jpeg,gif,tiff,png',
            'title'=>'required',
            'subtitle'=>'required',
            'loan_year'=>'required',
            'interest_rate'=>'required',
            'insurance'=>'required',
            'order'=>'required'
        ];

        $request->validate($rules);

        $information = new FinancialSupport();
        if($request->hasFile('photo'))
        {
           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/financial-support/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;
        }
        $information->title = $request->title;
        $information->subtitle = $request->subtitle;
        $information->loan_year = $request->loan_year;
        $information->interest_rate = $request->interest_rate;
        $information->insurance = $request->insurance;
        $information->order = $request->order;
        $information->description = $request->description;
        $information->save();

        return redirect()->route('financial-support.index')->with('message','Financial added successfully!!');




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
        $information = FinancialSupport::findOrfail($id);
        $module = $this->module;

        return view('admin.financial-support.edit',
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
            'photo'=>'mimes:jpg,jpeg,gif,tiff,png',
            'title'=>'required',
            'subtitle'=>'required',
            'loan_year'=>'required',
            'interest_rate'=>'required',
            'insurance'=>'required',
            'order'=>'required'
        ];

        $request->validate($rules);

        $information = FinancialSupport::findOrfail($id);
        $information->title = $request->title;
        $information->subtitle = $request->subtitle;
        $information->loan_year = $request->loan_year;
        $information->interest_rate = $request->interest_rate;

        if($request->hasFile('photo')){
            $old_file = public_path().'/financial-support/'.$information->photo;


            if(File::exists($old_file)){
                File::delete($old_file);
            }
           $file = $request->file('photo');
           $extension = '.'.$request->file('photo')->extension();
           $path = public_path().'/financial-support/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->photo = $filename;
        }

        $information->insurance = $request->insurance;
        $information->order = $request->order;
        $information->description = $request->description;
        $information->save();

        return redirect()->route('financial-support.index')->with('message','Financial added successfully!!');


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
            $informations = FinancialSupport::whereIn('id',$id)->get();


            if($informations->isEmpty()==false){
                foreach ($informations as  $value) {
                    $value->delete();
                }

            return redirect()->route('financial-support.index')
            ->with('message','Financial support deleted successfully!!');
            }
        }

              return redirect()->route('financial-support.index')
            ->with('error','Financial support not found or already deleted!!');

    }
}
