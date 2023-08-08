<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $keyword = $request->keyword;
        $informations = Message::orderBy('id','DESC');

        // dd($request->keyword);

        if($keyword){


            $informations =  $informations ->where(function($q) use ($keyword){
            $q->where('contact_for', 'like', '%' . $keyword . '%')
              ->orwhere('email', 'like', '%' . $keyword . '%')
              ->orwhere('name', 'like', '%' . $keyword . '%')
              ->orwhere('phone', 'like', '%' . $keyword . '%')
              ->orwhere('message', 'like', '%' . $keyword . '%');

        });

    }

    $informations = $informations->paginate(50);

        return view('admin.message.index',
            compact('informations','keyword')
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
            $informations = Message::whereIn('id',$id)->get();

            foreach ($informations as  $value) {
                $value->delete();
            }
            return redirect()
            ->route('message.index')
            ->with('message','Contact/Message Deleted Successfully!!');

        }



        return redirect()
                ->route('message.index')
                ->with('error','Either Noone of selected or selected items already deleted!!');
    }
}
