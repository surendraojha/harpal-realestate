<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoostPost;
use App\Models\BoostSubscription;
use Illuminate\Http\Request;

class BoostSubscriptionController extends Controller
{

    public function __construct(){
        $this->module = 'Boost Subscription';
    }

    public function index(Request $request)
    {
        //
        $keyword = $request->keyword;

        $informations = BoostSubscription::orderBy('order');


        if($keyword){
            $informations = $informations->where('title', 'like', '%' . $keyword . '%');
        }


        $informations = $informations->paginate(30);

        $module = $this->module;
        return view('admin.boost-subscription.index',
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
            'price'=>'required',
            'feature_label_1'=>'required',
            'feature_value_1'=>'required',

            'feature_label_2'=>'required',
            'feature_value_2'=>'required',


            // 'feature_label_3'=>'required',
            // 'feature_value_3'=>'required',

            // 'feature_label_4'=>'required',
            // 'feature_value_4'=>'required',

            // 'feature_label_5'=>'required',
            // 'feature_value_5'=>'required',

            // 'feature_label_6'=>'required',
            // 'feature_value_6'=>'required',


            // 'feature_label_6'=>'required',
            // 'feature_value_6'=>'required',
        ];


        $request->validate($rules);


        $information = new BoostSubscription();

        $information->title = $request->title;

        $information->feature_label_1 = $request->feature_label_1;
        $information->feature_value_1 = $request->feature_value_1;
        $information->feature_label_2 = $request->feature_label_2;
        $information->feature_value_2 = $request->feature_value_2;
        $information->feature_label_3 = $request->feature_label_3;
        $information->feature_value_3 = $request->feature_value_3;



        $information->feature_label_4 = $request->feature_label_4;
        $information->feature_value_4 = $request->feature_value_4;


        $information->feature_label_5 = $request->feature_label_5;
        $information->feature_value_5 = $request->feature_value_5;




        $information->feature_label_6 = $request->feature_label_6;
        $information->feature_value_6 = $request->feature_value_6;


        $information->feature_label_7 = $request->feature_label_7;
        $information->feature_value_7 = $request->feature_value_7;




        $information->feature_label_8 = $request->feature_label_8;
        $information->feature_value_8 = $request->feature_value_8;


        $information->feature_label_9 = $request->feature_label_9;
        $information->feature_value_9 = $request->feature_value_9;

        $information->feature_label_10 = $request->feature_label_10;
        $information->feature_value_10 = $request->feature_value_10;




        $information->order = $request->order;



        $information->color = $request->color;

        $information->status = $request->status;
        $information->price = $request->price;

        $information->save();


        return redirect()
                ->route('boost-subscription.index')
                ->with('message','Boost Subscription Created Successfully');


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
        $information = BoostSubscription::find($id);
        $module = $this->module;

        return view('admin.boost-subscription.edit',
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
        'order'=>'required',
        'price'=>'required',

        'feature_label_1'=>'required',
        'feature_value_1'=>'required',

        'feature_label_2'=>'required',
        'feature_value_2'=>'required',


        // 'feature_label_3'=>'required',
        // 'feature_value_3'=>'required',

        // 'feature_label_4'=>'required',
        // 'feature_value_4'=>'required',

        // 'feature_label_5'=>'required',
        // 'feature_value_5'=>'required',

        // 'feature_label_6'=>'required',
        // 'feature_value_6'=>'required',


        // 'feature_label_6'=>'required',
        // 'feature_value_6'=>'required',
    ];


    $request->validate($rules);


    $information = BoostSubscription::findorfail($id);

    $information->title = $information->title;

    $information->feature_label_1 = $request->feature_label_1;
    $information->feature_value_1 = $request->feature_value_1;
    $information->feature_label_2 = $request->feature_label_2;
    $information->feature_value_2 = $request->feature_value_2;
    $information->feature_label_3 = $request->feature_label_3;
    $information->feature_value_3 = $request->feature_value_3;



    $information->feature_label_4 = $request->feature_label_4;
    $information->feature_value_4 = $request->feature_value_4;


    $information->feature_label_5 = $request->feature_label_5;
    $information->feature_value_5 = $request->feature_value_5;




    $information->feature_label_6 = $request->feature_label_6;
    $information->feature_value_6 = $request->feature_value_6;


    $information->feature_label_7 = $request->feature_label_7;
    $information->feature_value_7 = $request->feature_value_7;




    $information->feature_label_8 = $request->feature_label_8;
    $information->feature_value_8 = $request->feature_value_8;


    $information->feature_label_9 = $request->feature_label_9;
    $information->feature_value_9 = $request->feature_value_9;

    $information->feature_label_10 = $request->feature_label_10;
    $information->feature_value_10 = $request->feature_value_10;




    $information->order = $request->order;



    $information->color = $information->color;

    $information->status = $request->status;

    $information->price = $request->price;

    $information->save();
        return redirect()
                ->route('boost-subscription.index')
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
            $informations = BoostSubscription::whereIn('id',$id)->get();


            if($informations->isEmpty()==false){

                $boost = BoostPost::whereIn('subscription_id',$id)->get();

                if($boost->isEmpty()==false){
                    return redirect()->route('boost-subscription.index')
                    ->with('error','Can not Delete This Subscription ,This subscription is already used by users!!');
                }

                foreach ($informations as $value) {
                    $value->delete();
                }

                return redirect()->route('boost-subscription.index')
                        ->with('message','Boost Subscription Deleted Successfully!!');
            }

        }


        return redirect()->route('boost-subscription.index')
        ->with('error','Please Select Atleast one item for delete operation!!');

    }
}
