<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PropertyPhoto;
use Illuminate\Http\Request;
use File;
class AjaxController extends Controller
{
    public function getSubcategory($id){

        if($id=='both'){
            $informations = Category::whereNotNull('parent')->orderBy('order')->where('status','1')->get();
        }else{
            $informations =Category::where('parent',$id)->orderBy('order')->where('status','1')->get();

        }






        return response()->json(['status'=>200,'data'=>$informations]);

    }

    public function deletePhoto($id,$div_id){
        $information = PropertyPhoto::find($id);

        if($information){
            $old_file = public_path().'/uploads/'.$information->photo;

            if(File::exists($old_file)){
                File::delete($old_file);
            }

            $information->delete();

            return response()->json(['div_id'=>$div_id]);

        }else{
            return response()->json(['error'=>'item not found']);
        }



    }
}
