<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DateHelper;
use App\Helpers\FileHelper;
use App\Helpers\NumberHelper;
use App\Helpers\PropertyHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FAQ;
use App\Models\Feature;
use App\Models\Floor;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\PropertyPhoto;
use App\Models\Purpose;
use App\Models\RoadSize;
use App\Models\SupportForum;
use Faker\Core\Number;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class CommercialPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $module;

     public function __construct(){
         $this->module='Commercial Property';
     }


    public function index(Request $request)
    {
        $result = $this->search($request);

        $informations = $result[0];
        $count = $result[1];


        $keyword = $request->keyword;

        $ad_status = $request->ad_status;

        $per_page = $request->per_page;
        if(!$per_page){
            $per_page=10;
        }


        // for create page

        $categories = Category::where('parent')->orderBy('order')->pluck('title','id')->toArray();

        // array_push($categories,'both'=>'Both');


        $floors = Floor::where('status',1)->orderBy('order')->get();

        $road_sizes = RoadSize::where('status','1')->orderBy('order')->get();

        $additional_features = Feature::where('status','1')->orderBy('order')->get();


        $locations = Location::orderBy('order')->get();



        $years =[];



        $current_year = date('Y');

        for($i=$current_year;$i>=1970;$i--){

            $date = $i.'-'.date('m-d');
            $nepali_year = DateHelper::englishToNepaliYear($date);
            $years[]=$nepali_year;
        }


        $checked_features=[];

        $module = $this->module;

        $purposes = Purpose::orderBy('order')->pluck('title','id');

        return view('admin.commercial-property.index',
            compact('informations',
                'module',
                'ad_status',
                'keyword',
                'years',
                'categories',
                'floors',
                'road_sizes',
                'locations',
                'additional_features',
                'checked_features',
                'purposes',
                'per_page',
                'count'

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
        $information = new Property();

            $rules = PropertyHelper::commericialPropertyValidation();




        $msg = [
            'purpose_id'=>'purpose',
            'category_id'=>'Category',
            'sub_category_id'=>'Sub Category',
            'floor_id'=>'Floor',
            'road_size_id'=>'Road Type',
            'location_id'=>'Location',
        ];

        $request->validate($rules,[],$msg);

        $information = new Property();
        $user = auth()->user();


          if($request->shitting_room){
            $information->shitting_room = (int)$request->shitting_room;
        }else{
            $information->shitting_room=0;
        }

        $information->ad_id = 'KB'.date('ymdhis').$user->id;
        $information->slug = Str::slug($request->title).'-'.$information->ad_id;
        $information->purpose_id = $request->purpose_id;
        $information->title = $request->title;

        $information->price = NumberHelper::unformatNumber($request->price);

        $information->video_code = $request->video_code;

        $information->price_negotiable = $request->price_negotiable;
        $information->category_id = $request->category_id;
        $information->sub_category_id = $request->sub_category_id;
        $information->date_of_build = $request->date_of_build;
        $information->buld_up_area = $request->buld_up_area;
        $information->area_covered = $request->area_covered;
        $information->parking = $request->parking;
        $information->floor_id = $request->floor_id;
        $information->road_size_id = $request->road_size_id;
        $information->pantry = $request->pantry;
        $information->bathroom = $request->bathroom;
        $information->faced = $request->faced;
        $information->lift = $request->lift;
        $information->contact_number = $request->contact_number;
        $information->water = $request->water;
        if($request->view || $request->view==0){
            $information->view = $request->view;
        }
        $location = Location::where('id',$request->location_id)->first();

        if(!$location){
            $location = new Location();
            $location->location = $request->location_id;
            $location->order = rand(1,2000);
            $location->save();
            $information->location_id = $location->id;
        }else{
            $information->location_id = $request->location_id;

        }        $information->overview = $request->overview;

        $information->user_id = auth()->user()->id;
        $information->expiration_date = date('Y-m-d', strtotime("+9 months", strtotime(date('Y-m-d'))));

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
        $information->status = $request->status;
           $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;
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




        return redirect()->route('admin-commercial-property.index')
                ->with('message','Commercial Propety Added Successully!!');

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
        $information = Property::where('id',$id)->firstOrFail();



        $user = auth()->user();



        $purposes = Purpose::orderBy('order')->where('id','!=',2)->get();


        $categories = Category::where('parent')->where('status',1)->orderBy('order')->get();

        $floors = Floor::where('status',1)->orderBy('order')->get();

        $road_sizes = RoadSize::where('status','1')->orderBy('order')->get();

        $additional_features = Feature::where('status','1')->orderBy('order')->get();


        $locations = Location::orderBy('order')->get();



        $years =[];



        $current_year = date('Y');

        for($i=$current_year;$i>=1970;$i--){

            $date = $i.'-'.date('m-d');
            $nepali_year = DateHelper::englishToNepaliYear($date);
            $years[]=$nepali_year;
        }


        $photos = PropertyPhoto::where('property_id',$information->id)->get();

        $checked_features = PropertyFeature::where('property_id',$information->id)
        ->pluck('feature_id','feature_id')
        ->toArray();


        $module = $this->module;

        return view('admin.commercial-property.edit',
            compact(
                'information',
                'user',
                'categories',
                'floors',
                'road_sizes',
                'additional_features',
                'locations',
                'years',
                'purposes',
                'photos',
                'checked_features',
                'module'
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
        $information = new Property();

                $rules = PropertyHelper::commericialPropertyValidation();



        $msg = [
            'purpose_id'=>'purpose',
            'category_id'=>'Category',
            'sub_category_id'=>'Sub Category',
            'floor_id'=>'Floor',
            'road_size_id'=>'Road Type',
            'location_id'=>'Location',
        ];

        $request->validate($rules,[],$msg);

        $information = Property::findorfail($id);
        $user = auth()->user();

          if($request->shitting_room){
            $information->shitting_room = (int)$request->shitting_room;
        }else{
            $information->shitting_room=0;
        }
        // $information->ad_id = 'KB'.date('ymdhis').$user->id;
        // $information->slug = Str::slug($request->title).'-'.$information->ad_id;
        $information->purpose_id = $request->purpose_id;
        $information->title = $request->title;

        $information->price = NumberHelper::unformatNumber($request->price);

        $information->video_code = $request->video_code;

        $information->price_negotiable = $request->price_negotiable;
        $information->category_id = $request->category_id;
        $information->sub_category_id = $request->sub_category_id;
        $information->date_of_build = $request->date_of_build;
        $information->buld_up_area = $request->buld_up_area;
        $information->area_covered = $request->area_covered;
        $information->parking = $request->parking;
        $information->floor_id = $request->floor_id;
        $information->road_size_id = $request->road_size_id;
        $information->pantry = $request->pantry;
        $information->bathroom = $request->bathroom;
        $information->faced = $request->faced;
        $information->lift = $request->lift;
        $information->contact_number = $request->contact_number;
        $information->water = $request->water;
        $location = Location::where('id',$request->location_id)->first();

        if(!$location){
            $location = new Location();
            $location->location = $request->location_id;
            $location->order = rand(1,2000);
            $location->save();
            $information->location_id = $location->id;
        }else{
            $information->location_id = $request->location_id;

        }        $information->overview = $request->overview;

        $information->expiration_date = date('Y-m-d', strtotime("+9 months", strtotime(date('Y-m-d'))));

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

        $information->status = $request->status;
        if($request->view || $request->view==0){
              $information->view = $request->view;
        }


        $information->meta_title = $request->meta_title;
        $information->meta_keyword = $request->meta_keyword;
        $information->meta_description = $request->meta_description;


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


        return redirect()->route('admin-commercial-property.index')
                ->with('message','Commercial Propety Updated Successully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    // commercial property search
    public function search($request){
        $keyword = $request->keyword;

        $ad_status = $request->ad_status;
        $current_date = date('Y-m-d');
       $per_page = $request->per_page;

        if(!$per_page){
            $per_page=10;
        }
        $informations = Property::orderBy('id','DESC')
        ->with('location');

        if($ad_status){

            if($ad_status=='pending'){
                $informations = $informations->where('status','0');

            }elseif($ad_status=='active'){

                $informations = $informations->where('status','1')
                ->whereDate('expiration_date', '>=', $current_date);

            }elseif($ad_status=='my-properties'){
                $user = auth()->user();
                $informations = $informations->where('user_id',$user->id);

            }else{



                $informations = $informations->where(function ($query) use ($current_date) {
                    $query->where('status', 2)
                    ->orWhereDate('expiration_date', '<', $current_date);

                });

            }
        }



        if($keyword){
            $informations = $informations->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhereHas('location', function ($query) use ($keyword) {
                        $query->where('location', 'like', '%' . $keyword . '%')
                        ->orWhere('ad_id', 'like', '%' . $keyword . '%');
                    });

                });
        }

        $informations = $informations->where('category_id',3);

        $count = $informations->count();

         $informations= $informations->paginate($per_page);

         return [$informations,$count];
    }
}
