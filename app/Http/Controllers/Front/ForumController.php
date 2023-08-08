<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\LikeForum;
use App\Models\Meta;
use App\Models\SupportForum;
use Illuminate\Http\Request;

class ForumController extends Controller
{

    public function index(){

        $forums = SupportForum::where('status',1)
                ->orderBy('id','DESC')
                ->whereNull('parent')
                ->paginate(2);
        $meta = Meta::where('module','Support Forum Page')->first();
            //  dd($forums);

        return view('front.forum.index',
            compact('forums','meta')
        );
    }

    public function likeForum($id){
        $user_id = auth()->user()->id;

        $information = LikeForum::where('support_forum_id',$id)
                    ->where('user_id',$user_id)
                    ->first();

        if($information){
            $information->delete();
        }else{
            $information = new LikeForum();
            $information->user_id = $user_id;
            $information->support_forum_id = $id;
            $information->save();
        }


        $informations = LikeForum::where('support_forum_id',$id)->count();

        return response()->json(['like'=>$informations]);
    }

    public function submitForum(Request $request){

        $rules = [
            'comment'=>'required'
        ];

        $request->validate($rules);

        $information = new SupportForum();
        if($request->property_id){
            $information->property_id = $request->property_id;
        }



        if($request->parent){
            $information->parent = $request->parent;
        }
        $information->comment = $request->comment;

        $information->user_id = auth()->user()->id;
        $information->status =1;
        $information->save();


        return redirect()->back()->with('message','Your Comment is added successfully!!');
    }




}
