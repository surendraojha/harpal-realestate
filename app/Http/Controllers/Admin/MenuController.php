<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DynamicMenu;
use App\Models\DynamicMenuList;
use App\Models\Menu;
use App\Models\MenuList;
use Illuminate\Http\Request;
use Session;
class MenuController extends Controller
{
    //

    public function index(){

        $depth = 1;

        $informations = MenuList::latest()
                        // ->where('depth',$depth)
                        ->get();
        $parent = MenuList::pluck('label','id');


        return view('admin.menu.index',
            compact('informations',
                'parent',
                'depth'
            )
        );

    }


    public function store(Request $request){



        $information = new MenuList();

        $information->label = $request->label;
        $information->link = $request->link;

        if($request->parent){
            $information->parent = $request->parent;
        }

        $information->sort = $request->sort;


	    // sort
	    // class

	    $information->depth = $request->depth;
        $information->save();

        return redirect()->route('menu.index');



    }


    public function edit($id){

    }


    public function update(Request $request,$id){


        $information = MenuList::find($id);

        $information->label = $request->label;
        $information->link = $request->link;

        if($request->parent){
            $information->parent = $request->parent;
        }

        $information->sort = $request->sort;


	    // sort
	    // class

	    $information->depth = $request->depth;
        $information->save();

        return redirect()->route('menu.index');
    }


    public function show($id){

        $explode = explode('-',$id);

        $id= $explode[0];

        $depth = $explode[1];


        $parent = MenuList::where('depth',$depth)->pluck('label','id');


        $depth = $depth+1;

        $informations = MenuList::latest()
        ->where('depth',$depth)
        ->get();


        return view('admin.menu.index',
            compact('informations',
                'parent',
                'depth'

            )
        );
    }


    public function getSubMenu($id){

        $informations = MenuList::where('parent',$id)->orderBy('sort')->get();

        if($informations->isEmpty()==false){
            return response()->json(['status'=>'200','data'=>$informations]);

        }else{
            return response()->json(['status'=>'404']);

        }

    }
}
