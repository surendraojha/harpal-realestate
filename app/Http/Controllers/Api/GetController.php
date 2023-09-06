<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\MunicipalityResource;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\PurposeResource;
use App\Http\Resources\WodaResource;
use App\Models\Category;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\Purpose;
use App\Models\Woda;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function getProvince(){

        $informations = Province::orderBy('id')->get();

        $data = ProvinceResource::collection($informations);


        return response()->json(['status'=>'success','data'=>$data]);

    }

    public function getDistrict(Request $request){
        $province_id = $request->province_id;

        $informations = District::orderBy('id');


        if($province_id){
            $informations = $informations->where('province_id',$province_id);
        }

        $informations=$informations->get();

        $data= DistrictResource::collection($informations);
        return response()->json(['status'=>'success','data'=>$data]);


    }

    public function getMunicipality(Request $request){

        $district_id = $request->district_id;

        $informations = Municipality::orderBy('id');

        if($district_id){
            $informations = $informations->where('district_id',$district_id);
        }

        $informations=$informations->get();

        $data = MunicipalityResource::collection($informations);
        return response()->json(['status'=>'success','data'=>$data]);

    }

    public function getWoda(Request $request){

        $municipality_id = $request->municipality_id;
        $informations = Woda::orderBy('id');



        if($municipality_id){
            $informations = $informations->where('municipality_id',$municipality_id);
        }
        $informations=$informations->get();


        $data = WodaResource::collection($informations);

        return response()->json(['status'=>'success','data'=>$data]);


    }

    public function getPurpose(){
        $informations = Purpose::orderBy('order')->get();

        $data = PurposeResource::collection($informations);

        return response()->json(['status'=>'success','data'=>$data]);

    }


    public function getCategory(Request $request){

        $parent = $request->parent;

        $type = $request->type;

        $informations = Category::orderBy('order');


        if($type=='main'){
          $informations =  $informations->whereNull('parent');

        }




        if($parent){
            $informations = $informations->where('parent',$parent);
        }

        $informations=$informations->get();

        $data = CategoryResource::collection($informations);

        return response()->json(['status'=>'success','data'=>$data]);


    }


    public function getCategoryDetail($id){

        $information = Category::find($id);

        if(!$information){
            if(!$information){
                return response()->json(['status' => 'failed', 'errors' => 'Category not found'], 404);

            }
        }


        $data = new CategoryResource($information);
        return response()->json(['status' => 'success', 'data' => $data], 200);


    }



}
