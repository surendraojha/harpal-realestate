<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DateHelper;
use App\Helpers\FileHelper;
use App\Helpers\NumberHelper;
use App\Helpers\VideoHelper;
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
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $module;

     public function __construct()
     {
         $this->module='Property';
     }

    public function index(Request $request)
    {

        $informations = $this->search($request);
        $keyword = $request->keyword;

        $ad_status = $request->ad_status;




        // for create page

        $categories = Category::where('parent')->orderBy('order')->pluck('title','id')->toArray();

        $categories['both']= 'Both';
        // array_push($categories,'both'=>'Both');


        $floors = Floor::where('status',1)->orderBy('order')->pluck('title','id');

        $road_sizes = RoadSize::where('status','1')->orderBy('order')->pluck('title','id');

        $additional_features = Feature::where('status','1')->orderBy('order')->get();


        $locations = Location::orderBy('order')->pluck('location','id');



        $years =[];



        $current_year = date('Y');

        for($i=$current_year;$i>=1970;$i--){

            $date = $i.'-'.date('m-d');
            $nepali_year = DateHelper::englishToNepaliYear($date);
            $years[]=$nepali_year;
        }


        $checked_features=[];

        $module = $this->module;

        $purposes = Purpose::orderBy('order')->where('id','!=',2)->pluck('title','id');

        return view('admin.property.index',
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
                'purposes'

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

        $rules = [
            'featured_photo'=>'required|image',
            'title'=>'required',
            'bedroom'=>'required',
            'bathroom'=>'required',
            // 'parking'=>'required',
            // 'balcony'=>'required',
            'water'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'purpose_id'=>'required',
            'sub_category_id'=>'required',
            'location_id'=>'required',
            'floor_id'=>'required',
            // 'kitchen'=>'required',
	        // 'furnishing'=>'required',
	        // 'faced'=>'required',
	        'contact_number'=>'required',
            // 'area_covered'=>'required',
            // 'buld_up_area'=>'required',
            'price_negotiable'=>'required',

            'video'=>'mimes:mp4,mov,ogg,qt'

        ];


        $request->validate($rules);

        $user = auth()->user();
        $information = new Property();
        $information->title = $request->title;
        $information->ad_id = 'KB'.date('ymdhis').$user->id;
        $information->slug = Str::slug($request->title).'-'.$information->ad_id;
        $information->purpose_id = $request->purpose_id;
        $information->date_of_build = $request->date_of_build;


        $information->bedroom = $request->bedroom;
        $information->bathroom = $request->bathroom;
        $information->parking = $request->parking;
        $information->balcony = $request->balcony;
        $information->water = $request->water;
        $information->location_for_map = $request->location_for_map;
        $information->overview = $request->overview;

        if($request->featured_video){
            $information = VideoHelper::saveVideoCode($information,$request);

        }


        $information->price = NumberHelper::unformatNumber($request->price);

        if($request->category_id){

            if($request->category_id=='both'){
                $information->both = 1;

                $category = Category::where('id',$request->sub_category_id)
                            ->with('category')->first();

                $information->category_id = $category->category->id;

            }else{
                $information->category_id = $request->category_id;

            }
        }

        $information->sub_category_id = $request->sub_category_id;
        $information->user_id = $user->id;

        $information->status =$request->status;

        $information->floor_id = $request->floor_id;


        if($request->road_size_id){
            $information->road_size_id = $request->road_size_id;
        }

        $information->location_id = $request->location_id;

        if($request->hasFile('featured_photo'))
        {

           $filename = FileHelper::uploadImageWithWatermark($request->featured_photo,1200,null,null);

           $information->featured_photo = $filename;


        }


        $information->expiration_date = date('Y-m-d', strtotime("+9 months", strtotime(date('Y-m-d'))));


        $information->kitchen = $request->kitchen;
        $information->furnishing = $request->furnishing;
        $information->faced = $request->faced;
        $information->contact_number = $request->contact_number;
        $information->area_covered = $request->area_covered;
        $information->buld_up_area = $request->buld_up_area;
        $information->price_negotiable = $request->price_negotiable;
        if($request->view){
            $information->view = $request->view;

        }else{
            $information->view = 0;
        }



        if($request->hasFile('video'))
        {
           $file = $request->file('video');
           $extension = '.'.$request->file('video')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->video = $filename;
        }

        $information->meta_title = $request->meta_title;
        $information->meta_tag = $request->meta_tag;
        $information->meta_description = $request->meta_description;

        $information->save();


        // save additonal features


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


                $photo->photo = $filename;

                $photo->save();
            }
        }


        return redirect()
                ->route('property.index')
                ->with('message','Your Property Listed Successfully!!');


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
        $information = Property::find($id);


        $categories = Category::whereNull('parent')->orderBy('order')->pluck('title','id')->toArray();

        $categories['both']= 'Both';
        // array_push($categories,'both'=>'Both');


        $floors = Floor::where('status',1)->orderBy('order')->pluck('title','id');

        $road_sizes = RoadSize::where('status','1')->orderBy('order')->pluck('title','id');

        $additional_features = Feature::where('status','1')->orderBy('order')->get();


        $locations = Location::orderBy('order')->pluck('location','id');



        $years =[];



        $current_year = date('Y');

        for($i=$current_year;$i>=1970;$i--){

            $date = $i.'-'.date('m-d');
            $nepali_year = DateHelper::englishToNepaliYear($date);
            $years[]=$nepali_year;
        }

          $module = $this->module;

          $checked_features = PropertyFeature::where('property_id',$information->id)
                            ->pluck('feature_id','feature_id')
                            ->toArray();
        $purposes = Purpose::orderBy('order')->where('id','!=',2)->pluck('title','id');

        $photos = PropertyPhoto::where('property_id',$information->id)->get();


        return view('admin.property.edit',
            compact('information',
            'module',
            'years',
            'categories',
            'floors',
            'road_sizes',
            'locations',
            'additional_features',
            'checked_features',
            'purposes',
            'photos'

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
        // dd($request->feature_id);

        $rules = [
            'featured_photo'=>'image',
            'title'=>'required',
            'bedroom'=>'required',
            'bathroom'=>'required',
            // 'parking'=>'required',
            // 'balcony'=>'required',
            'water'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'purpose_id'=>'required',
            'sub_category_id'=>'required',
            'location_id'=>'required',
            'floor_id'=>'required',
            // 'kitchen'=>'required',
	        // 'furnishing'=>'required',
	        // 'faced'=>'required',
	        'contact_number'=>'required',
            // 'area_covered'=>'required',
            // 'buld_up_area'=>'required',
            'price_negotiable'=>'required',

            'video'=>'mimes:mp4,mov,ogg,qt'

        ];

        $request->validate($rules);

        $user = auth()->user();
        $information = Property::find($id);

        $information->title = $request->title;
        $information->slug = Str::slug($request->title).'-'.$information->ad_id;
        $information->date_of_build = $request->date_of_build;

        $information->purpose_id = $request->purpose_id;

        $information->bedroom = $request->bedroom;
        $information->bathroom = $request->bathroom;
        $information->parking = $request->parking;
        $information->balcony = $request->balcony;
        $information->water = $request->water;
        $information->location_for_map = $request->location_for_map;
        $information->overview = $request->overview;
        // $information->featured_video = $request->featured_video;

        if($request->featured_video){

            $information = VideoHelper::saveVideoCode($information,$request);

        }

        $information->price = NumberHelper::unformatNumber($request->price);

        if($request->category_id){

            if($request->category_id=='both'){
                $information->both = 1;

                $category = Category::where('id',$request->sub_category_id)
                            ->with('category')->first();

                $information->category_id = $category->category->id;

            }else{
                $information->category_id = $request->category_id;

            }
        }

        $information->sub_category_id = $request->sub_category_id;
        $information->user_id = $user->id;

        $information->status =$request->status;

        $information->floor_id = $request->floor_id;


        if($request->road_size_id){
            $information->road_size_id = $request->road_size_id;
        }

        $information->location_id = $request->location_id;

        if($request->hasFile('featured_photo'))
        {
            $old_file = public_path().'/uploads/'.$information->featured_photo;


            if(File::exists($old_file)){
                File::delete($old_file);
            }
            $filename = FileHelper::uploadImageWithWatermark($request->featured_photo,1200,null,null);

           $information->featured_photo = $filename;
        }
        $information->expiration_date = date('Y-m-d', strtotime("+9 months", strtotime(date('Y-m-d'))));
        $information->kitchen = $request->kitchen;
        $information->furnishing = $request->furnishing;
        $information->faced = $request->faced;
        $information->contact_number = $request->contact_number;
        $information->area_covered = $request->area_covered;
        $information->buld_up_area = $request->buld_up_area;
        $information->price_negotiable = $request->price_negotiable;

        if($request->view){
            $information->view = $request->view;

        }else{
            $information->view = 0;
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

        $information->meta_title = $request->meta_title;
        $information->meta_tag = $request->meta_tag;
        $information->meta_description = $request->meta_description;
        $information->save();


        // delete additional features

        $additional_feature = PropertyFeature::where('property_id',$information->id)->delete();

        // save additonal features


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


                $photo->photo = $filename;

                $photo->save();
            }
        }
        return redirect()
        ->route('property.index')
        ->with('message','Your Property Updated Successfully!!');

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
            $informations = Property::whereIn('id',$id)->get();

            if($informations->isEmpty()==false){


                $faqs = FAQ::whereIn('property_id',$id)->count();


                if($faqs>0){
                    return redirect()->route('property.index')
                    ->with('error','Cannot perform delete operation. To delete This Property , Please Delete Related FAQs At First!!');
                }



                $support_forum = SupportForum::whereIn('property_id',$id)->count();


                if($support_forum>0){
                    return redirect()->route('property.index')
                    ->with('error','Cannot perform delete operation. To delete This Property , Please Delete Related Support Forum At First!!');
                }


                foreach ($informations as $value) {
                    $old_file = public_path().'/uploads/'.$value->featured_photo;



                    if(File::exists($old_file)){
                        File::delete($old_file);
                    }

                    $category_id = $value->category_id;
                    $value->delete();
                }

                if(@$category_id ==3){
                    return redirect()->route('admin-commercial-property.index')
                    ->with('message','Selected properties deleted successfully !! ');
                }else{
                    return redirect()->route('admin-residental-property.index')
                    ->with('message','Selected properties deleted successfully !! ');
                }


            }

        }


        return redirect()->route('property.index')
        ->with('error','No Selected Properties Available !! ');
    }

    public function search($request){
        $keyword = $request->keyword;

        $ad_status = $request->ad_status;
        $current_date = date('Y-m-d');

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





         $informations= $informations->where('purpose_id','!=',2)->paginate(50);

         return $informations;
    }


    public function removePhoto($id){
        $information = PropertyPhoto::find($id);

        $property_id = $information->property_id;

        $old_path = public_path().'/'.$information->photo;

        if(File::exists($old_path)){
            File::delete($old_path);
        }

        $information->delete();

        return redirect()->route('property.edit',$property_id)->with('error','Property Photo Deleted Successfully!!');
    }

    public function deleteVideo($id){
        $information = Property::find($id);

        $old_file = public_path().'/uploads/'.$information->video;

        if(File::exists($old_file)){
            File::delete($old_file);
        }

        $information->video = null;
        $information->save();

        return response()->json(['status'=>'200']);

    }
}
