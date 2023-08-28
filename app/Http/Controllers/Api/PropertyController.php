<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(){

        $informations = Property::orderBy('id','DESC')->get();

        $data = PropertyResource::collection($informations);

        return response()->json(['status'=>'success','data'=>$data],200);


    }
}
