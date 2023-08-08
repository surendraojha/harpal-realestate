<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;

    public function __construct()
    {
        $this->module = 'Newsletter Subscribers';
    }
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $informations = NewsLetter::orderBy('id','DESC');


        if($keyword){
            $informations = $informations->Where('email', 'like', '%' . $keyword . '%');
        }

        $informations=$informations->paginate(50);

        return view('admin.newsletter.index',
            compact('informations',
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
            $informations = NewsLetter::whereIn('id',$id)->get();

            foreach ($informations as  $value) {
                $value->delete();
            }
            return redirect()
            ->route('newsletter.index')
            ->with('message','Newsletter Subscriber Deleted Successfully!!');

        }



        return redirect()
                ->route('newsletter.index')
                ->with('error','Either Noone of selected or selected items already deleted!!');
    }
}
