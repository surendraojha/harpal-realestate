<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\AdvertisementPosition;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->module = 'Advertisement';
    }

    public function index()
    {

        $informations = Advertisement::orderBy('id','desc')->paginate(30);

        $module = $this->module;

       $ad_section = [
            'above-featured-product' => 'Above Featured Product',
'below-featured-product'=> 'Below Featured Product',
'below-home-page-product'=> 'Below Home Page Product',
'below-new-deals'=> 'Below New Deals',
'below-forum'=> 'Below Forum',
'below-recommended'=> 'Below Recommended',
'below-about-us'=> 'Below About Us',

'between-home-page'=>'Between Home Page Property',


'login-page'=>'Sidebar Ad',




'single-page-sidebar' =>'Property View Page',

'page-top'=>'Page Top'

   ];

        return view('admin.advertisement.index',
            compact(
                'informations',
                'module',
                'ad_section'
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

     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'photo'=>'required|mimes:jpg,jpeg,gif,png',
            'link'=>'required|max:191',
            'ad_type'=>'required',
            // 'status'=>'required',

        ];

        // dd($request->ad_type);

        $request->validate($rules);

        $information = new Advertisement();
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $extension = '.'.$request->file('photo')->extension();
            $path = public_path().'/uploads/';
            $filename = date('ymdhis').$extension;
            $file->move($path, $filename);
            $information->photo = $filename;
         }
        $information->link = $request->link;
        $information->ad_type = 'nothing';
        $information->status = 1;
        //  $current_date = date('Y-m-d');
        // $information->expiration_date =  date('Y-m-d', strtotime("+9 months", strtotime($current_date)));;
        $information->save();


         for ($i=0; $i <count($request->ad_type) ; $i++) {
             $position = new AdvertisementPosition();

             $position->position = $request->ad_type[$i];
             $position->advertisement_id = $information->id;
             $position->save();
         }


        return redirect()
                ->route('advertisement.index')
                ->with('message','advertisement Created Successfully');


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
        $information = Advertisement::find($id);

        $position = AdvertisementPosition::where('advertisement_id',$information->id)->pluck('position','position')->toArray();
    //    dd($position);
        $module = $this->module;

        $ad_section = [
            'above-featured-product' => 'Above Featured Product',
'below-featured-product'=> 'Below Featured Product',
'between-home-page'=>'Between Home Page Property',
'below-home-page-product'=> 'Below Home Page Product',
'below-new-deals'=> 'Below New Deals',
'below-forum'=> 'Below Forum',
'below-recommended'=> 'Below Recommended',
'below-about-us'=> 'Below About Us',




'login-page'=>'Sidebar Ad',




'single-page-sidebar' =>'Property View Page',

'page-top'=>'Page Top'

   ];
        return view('admin.advertisement.edit',
            compact('information',
                'position',
                'module','ad_section'
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
            'photo'=>'mimes:jpg,jpeg,gif,png',
            'link'=>'required|max:191',
            'ad_type'=>'required'
            // 'status'=>'required',

        ];

        $request->validate($rules);

        $information = Advertisement::find($id);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $extension = '.'.$request->file('photo')->extension();
            $path = public_path().'/uploads/';
            $filename = date('ymdhis').$extension;
            $file->move($path, $filename);
            $information->photo = $filename;
         }
        $information->link = $request->link;
        // $information->ad_type = 'nothing';
        $information->status = 1;
        //  $current_date = date('Y-m-d');
    //    $information->expiration_date =  date('Y-m-d', strtotime("+9 months", strtotime($current_date)));;
        $information->save();


        $ad_position = AdvertisementPosition::where('advertisement_id',$information->id)->delete();
         for ($i=0; $i <count($request->ad_type) ; $i++) {
             $position = new AdvertisementPosition();

             $position->position = $request->ad_type[$i];
             $position->advertisement_id = $information->id;
             $position->save();
         }

        return redirect()
                ->route('advertisement.index')
                ->with('message','advertisement Updated Successfully');
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
            $informations = Advertisement::whereIn('id',$id)->get();





            if($informations->isEmpty()==false){
                foreach ($informations as $value) {
                    $value->delete();
                }


                return redirect()->route('advertisement.index')
                ->with('message','advertisement Deleted Successfully!!');
            }

        }


        return redirect()->route('advertisement.index')
        ->with('error','Please Select Atleast one item for delete operation!!');

    }
}
