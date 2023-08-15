<?php

namespace App\Http\Controllers\Front;

use App\Helpers\DateHelper;
use App\Helpers\NumberHelper;
use App\Helpers\VideoHelper;
use App\Http\Controllers\Controller;
use App\Mail\PropertyNotify;
use App\Models\BoostSubscription;
use App\Models\Category;
use App\Models\FAQ;
use App\Models\Feature;
use App\Models\Floor;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\PropertyPhoto;
use App\Models\Province;
use App\Models\Purpose;
use App\Models\RoadSize;
use App\Models\Setting;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $page_type = $request->page_type;

        if(!$page_type){
            $page_type = '2';
        }

        $user = auth()->user();
        $profile = UserProfile::with('user')
        ->where('user_id',$user->id)
        ->first();


        $current_date = date('Y-m-d');
        $active_properties = Property::where('user_id',$user->id)
                            ->where('status',1)
                            ->with('location')
                            ->where('purpose_id','!=',2)
                            ->whereDate('expiration_date', '>=', $current_date)
                            ->orderBy('id','desc')
                            ->paginate(10);

        $active_propertycount  = Property::where('user_id',$user->id)
                            ->where('status',1)
                            ->with('location')
                            ->where('purpose_id','!=',2)
                            ->whereDate('expiration_date', '>=', $current_date)
                            ->orderBy('id','desc')

                            ->count();

        $pending_properties = Property::where('user_id',$user->id)
                            ->where('status',0)
                            ->with('location')
                            ->orderBy('id','desc')
                            ->paginate(10);


        $pending_properties_count = Property::where('user_id',$user->id)
                            ->where('status',0)
                            ->where('purpose_id','!=',2)
                            ->with('location')
                            ->count();

        $fulfilled_properties = Property::where('user_id',$user->id)
                                ->where(function ($query) use ($current_date) {
                                    $query->where('status', 2)
                                    ->orWhereDate('expiration_date', '<', $current_date);

                                })
                                ->where('purpose_id','!=',2)
                                ->orderBy('id','desc')
                                ->with('location')
                                ->paginate(10);

        $fulfilled_properties_count = Property::where('user_id',$user->id)
                                ->where(function ($query) use ($current_date) {
                                    $query->where('status', 2)
                                    ->orWhereDate('expiration_date', '<', $current_date);

                                })
                                ->where('purpose_id','!=',2)

                                ->with('location')
                                ->count();


        $subscriptions = BoostSubscription::orderBy('order')
                                ->where('status',1)
                                ->get();

        return view('front.property.index',

            compact('active_properties',
                    'pending_properties',
                    'fulfilled_properties',
                    'user',
                    'fulfilled_properties_count',
                    'pending_properties_count',
                    'active_propertycount',
                    'profile',
                    'page_type',
                    'subscriptions'
            )
        );
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $data['categories'] = Category::where('depth',1)->get();

        $data['purposes'] = Purpose::orderBy('order')->get();

        $data['road_types'] = RoadSize::orderBy('order')->get();

        $data['title']= "Please list your property here.";

        $data['provinces'] = Province::orderBy('id')->get();

        $data['features'] = Feature::orderBy('order')->get();


        return view('front-new.property.create',$data);

        return view('front.property.create');
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $rules = [
            'featured_photo'=>'required|image',
            'title'=>'required',
            'purpose_id'=>'required',
            'province_id'=>'required',
            'district_id'=>'required',
            'municipality_id'=>'required',
            'woda_id'=>'required',
            // 'bedroom'=>'required',
            // 'bathroom'=>'required',

            // 'water'=>'required',
            'price'=>'required',
            'main_category_id'=>'required',
            'sub_category_id'=>'required',
            'child_category_id'=>'required',

            // 'location_id'=>'required',
            // 'floor_id'=>'required',
            'road_size_id'=>'required',
	        'contact_number'=>'required',
            'price_negotiable'=>'required',
            'video'=>'mimes:mp4,mov,ogg,qt'

        ];
        $msg = [
                'child_category_id'=>'Category',
                'location_id'=>'location',
                'floor_id'=>'floor',
                'road_size_id'=>'road size'
        ];

        $request->validate($rules,[],$msg);

        $user = auth()->user();
        $information = new Property();
        $information->title = $request->title;

        $information->ad_id = 'KB'.date('ymdhis').$user->id;
        $information->slug = Str::slug($request->title).'-'.$information->ad_id;
        $information->date_of_build = $request->date_of_build;

        $information->purpose_id = $request->purpose_id;

        $information->bedroom = $request->bedroom;
        $information->bathroom = $request->bathroom;
        $information->parking = $request->parking;
        $information->balcony = $request->balcony;
        $information->water = $request->water;
        $information->location_for_map = $request->location_for_map;
        $information->overview = $request->overview??$request->message;
        $information->featured_video = $request->featured_video;



        $information->province_id = $request->province_id;
        $information->district_id = $request->district_id;
        $information->municipality_id = $request->municipality_id;
        $information->woda_id = $request->woda_id;

        $information->area_covered = $request->area_covered;
        $information->buld_up_area = $request->buld_up_area;


        if($request->featured_video){
            $information = VideoHelper::saveVideoCode($information,$request);
        }


        $information->price =  NumberHelper::unformatNumber($request->price);


        $information->category_id = $request->sub_category_id;
        $information->sub_category_id = $request->child_category_id;

        $information->user_id = $user->id;

        $information->view =0;
        $information->status =0;

        // $information->floor_id = $request->floor_id;


        if($request->road_size_id){
            $information->road_size_id = $request->road_size_id;
        }

        // $location = Location::where('id',$request->location_id)->first();

        // if(!$location){
        //     $location = new Location();
        //     $location->location = $request->location_id;
        //     $location->order = rand(1,2000);
        //     $location->save();
        //     $information->location_id = $location->id;
        // }else{
        //     $information->location_id = $request->location_id;

        // }

        if($request->hasFile('featured_photo'))
        {
           $file = $request->file('featured_photo');
           $extension = '.'.$request->file('featured_photo')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
           $information->featured_photo = $filename;
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



        $information->expiration_date = date('Y-m-d', strtotime("+9 months", strtotime(date('Y-m-d'))));


        // $information->kitchen = $request->kitchen;
        // $information->furnishing = $request->furnishing;
        // $information->faced = $request->faced;
        $information->contact_number = $request->contact_number;
        $information->area_covered = $request->area_covered;
        $information->buld_up_area = $request->buld_up_area;
        $information->price_negotiable = $request->price_negotiable;



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


        if($request->photo){

            foreach ($request->file('photo') as $imagefile) {

                $photo = new PropertyPhoto();

                $photo->property_id = $information->id;

                $extension = '.'.$imagefile->extension();

                $path = public_path().'/uploads/';

                $filename = date('ymdhis').rand().$extension;

                $imagefile->move($path, $filename);

                $photo->photo = $filename;

                $photo->save();
            }
        }


        // send email to admin

        $setting = Setting::first();

        Mail::to($setting->email)->send(new PropertyNotify($information));


        return redirect()
        ->route('my-property.index',['page_type'=>1])
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
        $information = Property::where('slug',$id)->firstOrFail();

        $information->overview = str_replace("&nbsp;"," ",$information->overview);
        $information->overview  = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $information->overview);

        // dd($information);
        $additional_features = PropertyFeature::where('property_id',$information->id)->get();


        $faqs = FAQ::where('property_id',$information->id)->orderBy('order')->get();





        return view('front.property.show',
            compact('information','additional_features','faqs')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $information = Property::where('slug',$id)->firstOrFail();

        // if($information->category_id==1){
        //     return redirect()->route('residental-property.edit',$information->slug);
        // }else{
        //     return redirect()->route('commercial-property.edit',$information->slug);

        // }

        $user = auth()->user();

        $profile = UserProfile::with('user')
        ->where('user_id',$user->id)
        ->first();

        $purposes = Purpose::orderBy('order')->where('id','!=',2)->get();

        $profile = UserProfile::with('user')
                ->where('user_id',$user->id)
                ->first();
        $categories = Category::where('parent')->where('status',1)->orderBy('order')->get();

        $floors = Floor::where('status',1)->orderBy('order')->get();

        $road_sizes = RoadSize::where('status','1')->orderBy('order')->get();

        $additional_features = Feature::where('status','1')->orderBy('order')->get();


        $locations = Location::orderBy('order')->where('status',1)->get();



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

        $data['title']= "Edit Your Property";

        $data['information'] = Property::where('slug',$id)->where('user_id',auth()->user()->id)->firstOrfail();


        $data['categories'] = Category::where('depth',1)->get();

        $data['purposes'] = Purpose::orderBy('order')->get();

        $data['road_types'] = RoadSize::orderBy('order')->get();

        $data['provinces'] = Province::orderBy('id')->get();

        $data['features'] = Feature::orderBy('order')->get();

        

        return view('front-new.property.edit',$data);



        return view('front-new.property.edit',
            compact(
                'information',
                'user',
                'profile',
                'categories',
                'floors',
                'road_sizes',
                'additional_features',
                'locations',
                'years',
                'purposes',
                'photos',
                'checked_features',
                'profile'
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
        $rules = [
            'featured_photo'=>'image',
            'title'=>'required',
            // 'bedroom'=>'required',
            // 'bathroom'=>'required',
            // 'parking'=>'required',
            // 'balcony'=>'required',
            // 'water'=>'required',
            'price'=>'required',
            'purpose_id'=>'required',
            'main_category_id'=>'required',

            'sub_category_id'=>'required',
            'child_category_id'=>'required',
            'province_id'=>'required',
            'district_id'=>'required',
            'municipality_id'=>'required',

            // 'location_id'=>'required',
            // 'floor_id'=>'required',
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
        $information = Property::findOrfail($id);
        $information->title = $request->title;
        // $information->ad_id = 'KB'.date('ymdhis').$user->id;

        // $information->slug = Str::slug($request->title).'-'.$information->ad_id;
        $information->purpose_id = $request->purpose_id;
        // $information->date_of_build = $request->date_of_build;


        // $information->bedroom = $request->bedroom;
        // $information->bathroom = $request->bathroom;
        // $information->parking = $request->parking;
        // $information->balcony = $request->balcony;
        $information->water = $request->water;
        $information->location_for_map = $request->location_for_map;
        $information->overview = $request->overview;

        $information->category_id = $request->sub_category_id;
        $information->sub_category_id = $request->child_category_id;

        $information->province_id = $request->province_id;
        $information->district_id = $request->district_id;
        $information->municipality_id = $request->municipality_id;
        $information->woda_id = $request->woda_id;


        if($request->featured_video){
            $information = VideoHelper::saveVideoCode($information,$request);

        }


        $information->price = NumberHelper::unformatNumber($request->price);


        // $information->status =$request->status;

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
           $file = $request->file('featured_photo');
           $extension = '.'.$request->file('featured_photo')->extension();
           $path = public_path().'/uploads/';
           $filename = date('ymdhis').$extension;
           $file->move($path, $filename);
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


        $information->expiration_date = date('Y-m-d', strtotime("+9 months", strtotime(date('Y-m-d'))));


        $information->kitchen = $request->kitchen;
        $information->furnishing = $request->furnishing;
        $information->faced = $request->faced;
        $information->contact_number = $request->contact_number;
        $information->area_covered = $request->area_covered;
        $information->buld_up_area = $request->buld_up_area;
        $information->price_negotiable = $request->price_negotiable;




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

                $extension = '.'.$imagefile->extension();

                $path = public_path().'/uploads/';

                $filename = date('ymdhis').rand().$extension;

                $imagefile->move($path, $filename);

                $photo->photo = $filename;

                $photo->save();
            }
        }


        return redirect()
                ->route('my-property.index',['page_type'=>1])
                ->with('message','Your Property Listed Successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Property::findorFail($id);

        $old_path = public_path().'/uploads/'.$information->featured_photo;

        if(File::exists($old_path)){
            File::delete($old_path);
        }


        $photos = PropertyPhoto::where('property_id',$id)->get();


        foreach ($photos as $value) {

            $old_path = public_path().'/uploads/'.$value->photo;

            if(File::exists($old_path)){
                File::delete($old_path);
            }

            $value->delete();

        }

        $information->delete();

        return redirect()->back()
            ->with('error','Property Unlisted Successfully!!');
    }

    public function fulfilled($id){

        $user = auth()->user();
        $information = Property::where('id',$id)
                        ->where('user_id',$user->id)
                        ->first();

        if(!$information){
            return redirect()->route('front.home')->with('error','You Are Not Authorized To Perform This Action!!');
        }


        $information->status = 2;

        $information->save();
        return redirect()->route('my-property.index')->with('message','Marked As Fulfulled Successfully!!');

    }


    public function removePropertyPhoto($id){

        $information = PropertyPhoto::findOrfail($id);
        $old_path = public_path().'/uploads/'.$information->photo;

        if(File::exists($old_path)){
            File::delete($old_path);
        }

        $information->delete();


        return redirect()->back()->with('message','Photo removed successfully!!');


    }



    // redidental property


    // commercial property
}
