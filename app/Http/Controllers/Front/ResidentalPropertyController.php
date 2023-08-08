<?php

namespace App\Http\Controllers\Front;

use App\Helpers\DateHelper;
use App\Helpers\FileHelper;
use App\Helpers\NumberHelper;
use App\Helpers\PropertyHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Floor;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\PropertyPhoto;
use App\Models\Purpose;
use App\Models\RoadSize;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class ResidentalPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();


        $purposes = Purpose::orderBy('order')->where('id','!=',2)->get();

        $categories = Category::where('parent')->where('status',1)->orderBy('order')->get();

        $floors = Floor::where('status',1)->orderBy('order')->get();

        $road_sizes = RoadSize::where('status','1')->orderBy('order')->get();
        $additional_features = Feature::where('status','1')->orderBy('order')->get();
        $locations = Location::orderBy('order')->get();





        return view('front.residental-property.create',

            compact(
                'user',
                'categories',
                'floors',
                'road_sizes',
                'additional_features',
                'locations',
                'purposes'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules = PropertyHelper::residentalPropertyValidation();

        $msg = [
            'purpose_id'=>'Purpose',
            'title'=>'Property Title',
            'category_id'=>'Category',
            'sub_category_id'=>'Sub Category',
            'date_of_build'=>'required',
            'floor_id'=>'Floor',
            'road_size_id'=>'Road Type',
            'location_id'=>'Location',
            'shitting_room'=>'integer'
        ];

        $request->validate($rules,[],$msg);

        $information = new Property();
        $user = auth()->user();

        $information->ad_id = 'KB'.date('ymdhis').$user->id;
        $information->slug = Str::slug($request->title).'-'.$information->ad_id;
        $information->purpose_id = $request->purpose_id;
        $information->title = $request->title;

        if($request->shitting_room){
            $information->shitting_room = $request->shitting_room;
        }
        $information->price = NumberHelper::unformatNumber($request->price);
        $information->price_negotiable = $request->price_negotiable;
        $information->category_id = $request->category_id;
        $information->sub_category_id = $request->sub_category_id;
        $information->date_of_build = $request->date_of_build;
        $information->bedroom = $request->bedroom;
        $information->kitchen = $request->kitchen;
        $information->bathroom = $request->bathroom;
        $information->furnishing = $request->furnishing;
        $information->faced = $request->faced;
        $information->parking = $request->parking;
        $information->balcony = $request->balcony;
        $information->floor_id = $request->floor_id;
        $information->road_size_id = $request->road_size_id;
        $information->water = $request->water;
        $information->contact_number = $request->contact_number;

        $location = Location::where('id',$request->location_id)->first();

        if(!$location){
            $location = new Location();
            $location->location = $request->location_id;
            $location->order = rand(1,2000);
            $location->save();
            $information->location_id = $location->id;
        }else{
            $information->location_id = $request->location_id;

        }
        $information->overview = $request->overview;


        $information->user_id = auth()->user()->id;
        $information->expiration_date = date('Y-m-d', strtotime("+9 months", strtotime(date('Y-m-d'))));

        if($request->view){
            $information->view = $request->view;
        }

        if($request->hasFile('featured_photo')){

            $old_file = public_path().'/uploads/'.$information->featured_photo;

            if(File::exists($old_file)){
                File::delete($old_file);
            }


            $filename = FileHelper::uploadImageWithWatermark($request->featured_photo,1200,null,null);

            if($filename){
                           $information->featured_photo = $filename;

            }else{
                                           $information->featured_photo = null;

            }

        }


        if($request->hasFile('video'))
        {

            $old_file = public_path().'/uploads/'.$information->video;

            if(File::exists($old_file)){
                File::delete($old_file);
            }
           $file = $request->file('video');
           $extension = '.'.$request->file('video')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->video = $filename;
        }

        $information->save();

        if($request->feature_id){
            for($i =0;$i<count($request->feature_id);$i++){

                $additional_feature = new PropertyFeature();
                $additional_feature->property_id = $information->id;
                $additional_feature->feature_id = $request->feature_id[$i];
                $additional_feature->save();
            }
        }


        // upload multiple photos

        if($request->photo){

            foreach ($request->file('photo') as $imagefile) {

                $photo = new PropertyPhoto();

                $photo->property_id = $information->id;

                $filename = FileHelper::uploadImageWithWatermark($imagefile,1200,null,null);

                if($filename){
                          $photo->photo = $filename;

                $photo->save();
                }

            }
        }



        // return redirect('my-property?page_type=1')
        // ->with('message','Propety Added Successully!!');

        $url = PropertyHelper::redirectionPath($information);

        return redirect($url)
        ->with('message','Propety added Successully!!');



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
        $information = Property::where('slug',$id)->firstOrFail();



        $user = auth()->user();



        $purposes = Purpose::orderBy('order')->where('id','!=',2)->get();


        $categories = Category::where('parent')->where('status',1)->orderBy('order')->get();

        $floors = Floor::where('status',1)->orderBy('order')->get();

        $road_sizes = RoadSize::where('status','1')->orderBy('order')->get();

        $additional_features = Feature::where('status','1')->orderBy('order')->get();


        $locations = Location::orderBy('order')->get();






        $photos = PropertyPhoto::where('property_id',$information->id)->get();

        $checked_features = PropertyFeature::where('property_id',$information->id)
        ->pluck('feature_id','feature_id')
        ->toArray();


        return view('front.residental-property.edit',
            compact(
                'information',
                'user',
                'categories',
                'floors',
                'road_sizes',
                'additional_features',
                'locations',
                'purposes',
                'photos',
                'checked_features'
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


        $rules = PropertyHelper::residentalPropertyValidation();


        $msg = [
            'purpose_id'=>'Purpose',
            'title'=>'Property Title',
            'category_id'=>'Category',
            'sub_category_id'=>'Sub Category',
            'date_of_build'=>'required',
            'floor_id'=>'Floor',
            'road_size_id'=>'Road Type',
            'location_id'=>'Location',
        ];

        // dd('here');
        $request->validate($rules,[],$msg);

        $information = Property::where('id',$id)->firstOrfail();


        $user = auth()->user();

        // $information->ad_id = 'KB'.date('ymdhis').$user->id;
        // $information->slug = Str::slug($request->title).'-'.$information->ad_id;
        $information->purpose_id = $request->purpose_id;

          if($request->shitting_room){
            $information->shitting_room = (int)$request->shitting_room;
        }else{
            $information->shitting_room=0;
        }
        $information->title = $request->title;
        $information->price = NumberHelper::unformatNumber($request->price);
        $information->price_negotiable = $request->price_negotiable;
        $information->category_id = $request->category_id;
        $information->sub_category_id = $request->sub_category_id;
        $information->date_of_build = $request->date_of_build;
        $information->bedroom = $request->bedroom;
        $information->kitchen = $request->kitchen;
        $information->bathroom = $request->bathroom;
        $information->furnishing = $request->furnishing;
        $information->faced = $request->faced;
        $information->parking = $request->parking;
        $information->balcony = $request->balcony;
        $information->floor_id = $request->floor_id;
        $information->road_size_id = $request->road_size_id;
        $information->water = $request->water;
        $information->contact_number = $request->contact_number;




        $location = Location::where('id',$request->location_id)->first();

        if(!$location){
            $location = new Location();
            $location->location = $request->location_id;
            $location->order = rand(1,2000);
            $location->save();
            $information->location_id = $location->id;
        }else{
            $information->location_id = $request->location_id;

        }

        $information->overview = $request->overview;


        $information->user_id = auth()->user()->id;
        $information->expiration_date = date('Y-m-d', strtotime("+9 months", strtotime(date('Y-m-d'))));

        if($request->hasFile('featured_photo')){

            $old_file = public_path().'/uploads/'.$information->featured_photo;

            if(File::exists($old_file)){
                File::delete($old_file);
            }


            $filename = FileHelper::uploadImageWithWatermark($request->featured_photo,1200,null,null);

           $information->featured_photo = $filename;

        }


        if($request->hasFile('video'))
        {

            $old_file = public_path().'/uploads/'.$information->video;

            if(File::exists($old_file)){
                File::delete($old_file);
            }
           $file = $request->file('video');
           $extension = '.'.$request->file('video')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->video = $filename;
        }
        $information->water = $request->water;
        $information->date_of_build = $request->date_of_build;
        $information->save();

        if($request->feature_id){

            $features = PropertyFeature::where('property_id',$information->id)->delete();

            for($i =0;$i<count($request->feature_id);$i++){

                $additional_feature = new PropertyFeature();
                $additional_feature->property_id = $information->id;
                $additional_feature->feature_id = $request->feature_id[$i];
                $additional_feature->save();
            }
        }


        // upload multiple photos

        if($request->photo){

            foreach ($request->file('photo') as $imagefile) {

                $photo = new PropertyPhoto();

                $photo->property_id = $information->id;

                $filename = FileHelper::uploadImageWithWatermark($imagefile,1200,null,null);

                if($filename){
                    $photo->photo = $filename;
                    $photo->save();
                }

            }
        }
        $url = PropertyHelper::redirectionPath($information);


        return redirect($url)
        // ->route('my-property.index',['page_type'=>1])
        ->with('message','Propety updated Successully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
