<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Floor;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\RoadSize;
use Illuminate\Http\Request;

class SearchController extends Controller
{
      // filteration

      public function filterProperty(Request $request){

        $order = $request->order;

        $min =  Property::where('status',1)->min('price');
        $max = Property::where('status',1)->max('price');
        $road_size = $request->road_size;

        if($road_size==null){
            $road_size=[];
        }

        // dd($road_size);

        $floor = $request->floor;

        if( $floor ==null){
            $floor =[];
        }


        $category_id =$request->category_id;

        if( $category_id ==null){
            $category_id =[];
        }


        $location_id = $request->location;
        if( $location_id==null ){
            $location_id =[];
        }


        if($request->min){
            $price_min = (float)$request->min;

        }else{
            $price_min='';
        }

        if($request->max){
            $price_max = (float)$request->max;

        }else{
            $price_max='';
        }




        $featured_id = $request->feature_id;

        if( $featured_id==null ){
            $featured_id =[];
        }

        $informations = $this->filterFunction($request);


        $per_page = $request->per_page;


        if(!$per_page){
            $per_page=12;
        }
        $count_property = $informations->count();


        if($order){


            if($order=='latest'){
                $informations = $informations->orderBy('id','DESC');
            }elseif($order=='oldest'){
                $informations = $informations->orderBy('id');

            }elseif($order=='lowest-price'){
                $informations = $informations->orderBy('price');

            }elseif($order=='highest-price'){
                $informations = $informations->orderBy('price','DESC');

            }


        }

        $informations = $informations->paginate($per_page);

        $locations = Location::where('status',1)->orderBy('order')->get();

        $categories = Category::whereNull('parent')->orderBy('order')->get();


        $roadSizes = RoadSize::where('status',1)->orderBy('order')->get();

        $floors = Floor::where('status',1)->orderBy('order')->get();

        $additional_features = Feature::where('status',1)
                                ->orderBy('order')
                                ->get();
        // dd($additional_features);
        $featured_id = $request->feature;

        if(!$featured_id) {
            $featured_id = [] ;
        }



        return view('front.filteration',
            compact('locations',
                    'categories',
                    'roadSizes',
                    'floors',
                    'additional_features',
                    'informations',
                    'count_property',

                    // filter
                    'road_size',
                    'floor',
                    'category_id',
                    'location_id',
                    'min',
                    'max',
                    'price_min',
                    'price_max',
                    'featured_id',
                    'per_page',
                    'order'

            )
        );


    }



    public function filterFunction($request){

        $road_size = $request->road_size;

        $floor = $request->floor;
        $category_id =$request->category_id;
        $location_id = $request->location;


        $price_min =  $request->min;

        $price_max=  $request->max;


        $feature_id = $request->feature;

        $order = $request->order;

        $per_page = $request->per_page;

        $informations = Property::select('*');


        if($road_size){
            $informations = $informations->whereIn('road_size_id',$road_size);
        }


        if($floor){
            $informations = $informations->whereIn('floor_id',$floor);

        }

        if($category_id){
            $informations = $informations->whereIn('sub_category_id',$category_id);
        }

        if($location_id){
            $informations = $informations->whereIn('location_id',$location_id);
        }



        if($price_min && $price_max){
            $informations =$informations->whereBetween('price',[$price_min,$price_max]);

        }



        if($feature_id){

            $property_features = PropertyFeature::whereIn('feature_id',$feature_id)
                                ->pluck('property_id','property_id')
                                ->toArray();

            $property_features = array_unique($property_features);

            $informations = $informations->whereIn('id',$property_features);
        }


        $informations = $informations;

        return $informations;


    }
}
