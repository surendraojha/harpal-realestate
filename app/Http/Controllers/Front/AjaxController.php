<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Municipality;
use App\Models\PropertyPhoto;
use App\Models\Woda;
use Illuminate\Http\Request;
use File;
class AjaxController extends Controller
{


    public function getDistrict(Request $request){

        $id = $request->id;

        $informations = District::where('province_id',$id)
                        ->orderBy('id')
                        ->get();

        return response()->json($informations);
    }


    public function getMunicipality(Request $request){
        $id = $request->id;
        $informations = Municipality::where('district_id',$id)
                        ->orderBy('id')
                        ->get();

        return response()->json($informations);

    }



    public function getWoda(Request $request){
        $id = $request->id;

        $informations = Woda::where('municipality_id',$id)
                        ->orderBy('id')
                        ->get();

        return response()->json($informations);


    }

    public function getSubcategory(Request $request){

        $id = $request->id;
        $informations =Category::where('parent',$id)
                        ->orderBy('order')
                        ->where('status','1')
                        ->get();








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
