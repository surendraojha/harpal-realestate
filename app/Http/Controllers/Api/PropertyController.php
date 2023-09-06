<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;


use App\Helpers\DateHelper;
use App\Helpers\NumberHelper;
use App\Helpers\ValidatorHelper;
use App\Helpers\VideoHelper;
use App\Mail\PropertyNotify;
use App\Models\BoostSubscription;
use App\Models\Category;
use App\Models\FAQ;
use App\Models\Feature;
use App\Models\Floor;
use App\Models\Location;
use App\Models\PropertyFeature;
use App\Models\PropertyPhoto;
use App\Models\Province;
use App\Models\Purpose;
use App\Models\RoadSize;
use App\Models\Setting;
use App\Models\UserProfile;
use File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class PropertyController extends Controller
{
    public function index(Request $request)
    {

        $province_id = $request->province_id;
        $district_id = $request->district_id;
        $municipality_id = $request->municipality_id;
        $woda_id = $request->woda_id;

        $category_id = $request->category_id;
        $sub_category_id = $request->sub_category_id;
        $child_category_id = $request->child_category_id;

        $purpose_id = $request->purpose_id;

        $road_size_id = $request->road_size_id;


        $informations = Property::orderBy('id', 'DESC');

        if($purpose_id){
            $informations = $informations->where('purpose_id',$purpose_id);
        }

        if($province_id){
            $informations = $informations->where('province_id',$province_id);

        }


        if($district_id){
            $informations = $informations->where('district_id',$district_id);

        }


        if($municipality_id){
            $informations = $informations->where('municipality_id',$municipality_id);

        }


        if($woda_id){
            $informations = $informations->where('woda_id',$woda_id);

        }


        if($road_size_id){
            $informations = $informations->where('road_size_id',$road_size_id);

        }


       if($category_id){

            if($sub_category_id){
                if($child_category_id){
                    $informations = $informations->where('sub_category_id',$child_category_id);

                }else{

                    $child_categories = Category::where('parent',$sub_category_id)
                                    ->pluck('id','id')
                                    ->toArray();

                    $informations = $informations->where('sub_category_id',$child_categories);


                }

            }else{
                $sub_categories = Category::where('parent',$category_id)
                                ->pluck('id','id')
                                ->toArray();
                $child_categories = Category::whereIn('parent',$sub_categories)
                                    ->pluck('id','id')
                                    ->toArray();

            $informations = $informations->where('sub_category_id',$child_categories);

            }

       }





        $informations = $informations->get();

        $data = PropertyResource::collection($informations);

        return response()->json(['status' => 'success', 'data' => $data], 200);
    }

    public function store(Request $request)
    {


        // dd($request->all());
        $rules = [
            'featured_photo' => 'required|image',
            'title' => 'required',
            'purpose_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'municipality_id' => 'required',
            'woda_id' => 'required',
            // 'bedroom'=>'required',
            // 'bathroom'=>'required',

            // 'water'=>'required',
            'price' => 'required',
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
            'child_category_id' => 'required',

            // 'location_id'=>'required',
            // 'floor_id'=>'required',
            'road_size_id' => 'required',
            'contact_number' => 'required',
            'price_negotiable' => 'required',
            'video' => 'mimes:mp4,mov,ogg,qt'

        ];
        $msg = [
            'child_category_id' => 'Category',
            'location_id' => 'location',
            'floor_id' => 'floor',
            'road_size_id' => 'road size'
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            $errors = ValidatorHelper::validatorMessage($validator);

            return response()->json(['errors' => $errors], 422);
            // return response()->json(['errors' => $validator->errors()], 422);
        }


        $user = auth('api')->user();
        $information = new Property();
        $information->title = $request->title;

        $information->ad_id = 'KB' . date('ymdhis') . $user->id;
        $information->slug = Str::slug($request->title) . '-' . $information->ad_id;
        $information->date_of_build = $request->date_of_build;

        $information->purpose_id = $request->purpose_id;

        // $information->bedroom = $request->bedroom;
        // $information->bathroom = $request->bathroom;
        // $information->parking = $request->parking;
        // $information->balcony = $request->balcony;
        // $information->water = $request->water;
        $information->location_for_map = $request->location_for_map;
        $information->overview = $request->overview ?? $request->message;
        $information->featured_video = $request->featured_video;



        $information->province_id = $request->province_id;
        $information->district_id = $request->district_id;
        $information->municipality_id = $request->municipality_id;
        $information->woda_id = $request->woda_id;

        $information->area_covered = $request->area_covered;
        $information->buld_up_area = $request->buld_up_area;


        if ($request->featured_video) {
            $information = VideoHelper::saveVideoCode($information, $request);
        }


        $information->price =  NumberHelper::unformatNumber($request->price);


        $information->category_id = $request->sub_category_id;
        $information->sub_category_id = $request->child_category_id;

        $information->user_id = $user->id;

        $information->view = 0;
        $information->status = 0;

        // $information->floor_id = $request->floor_id;


        if ($request->road_size_id) {
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

        if ($request->hasFile('featured_photo')) {
            $file = $request->file('featured_photo');
            $extension = '.' . $request->file('featured_photo')->extension();
            $path = public_path() . '/uploads/';
            $filename = date('ymdhis') . $extension;
            $file->move($path, $filename);
            $information->featured_photo = $filename;
        }



        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $extension = '.' . $request->file('video')->extension();
            $path = public_path() . '/uploads/';
            $filename = date('ymdhis') . $extension;
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

        // dd($request->all());


        // $arr=[];
        // if($request->identifier){
        //     for ($i=0; $i < count($request->identifier) ; $i++) {
        //         $a=[];
        //         $field = $request->identifier[$i];
        //         $field = str_replace('[]','',$field);
        //         // dd($field);
        //         $a['label'] = $request->label[$i];
        //         $a['value'] = $request->$field[$i];
        //         $arr[]=$a;
        //     }
        // }



        $arr = [];
        if ($request->has('custom_field_identifier')) {
            $identifiers = $request->input('custom_field_identifier');
            $labels = $request->input('custom_field_label');
            $values = $request->input('custom_field_value');

            foreach ($identifiers as $index => $identifier) {
                $a = [
                    // 'identifier' => $identifier,
                    'identifier' => $identifiers[$index],
                    'label' => $labels[$index],
                    'value' => $values[$index]
                ];

                $arr[] = $a;
            }
        }



        // dd($arr);
        $information->custom_fields = json_encode($arr);


        $information->status = $request->status ?? 0;



        $information->save();


        // save additonal features


        if ($request->feature_id) {
            for ($i = 0; $i < count($request->feature_id); $i++) {
                $additional_feature = new PropertyFeature();
                $additional_feature->property_id = $information->id;
                $additional_feature->feature_id = $request->feature_id[$i];
                $additional_feature->save();
            }
        }


        if ($request->photo) {

            foreach ($request->file('photo') as $imagefile) {

                $photo = new PropertyPhoto();

                $photo->property_id = $information->id;

                $extension = '.' . $imagefile->extension();

                $path = public_path() . '/uploads/';

                $filename = date('ymdhis') . rand() . $extension;

                $imagefile->move($path, $filename);

                $photo->photo = $filename;

                $photo->save();
            }
        }


        // send email to admin

        $setting = Setting::first();

        Mail::to($setting->email)->send(new PropertyNotify($information));



        return response()->json(['status' => 'success', 'message' => 'Your Property Listed Successfully!!']);
    }

    public function show($id){
        $information = Property::find($id);

        if(!$information){
            return response()->json(['status' => 'failed', 'errors' => 'Propety not found'], 404);

        }

        $data = new PropertyResource($information);
        return response()->json(['status' => 'success', 'data' => $data], 200);


    }




    public function update(Request $request, $id)
    {




        // dd($request->all());
        $rules = [
            'featured_photo' => 'image',
            'title' => 'required',
            'purpose_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'municipality_id' => 'required',
            'woda_id' => 'required',
            // 'bedroom'=>'required',
            // 'bathroom'=>'required',

            // 'water'=>'required',
            'price' => 'required',
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
            'child_category_id' => 'required',

            // 'location_id'=>'required',
            // 'floor_id'=>'required',
            'road_size_id' => 'required',
            'contact_number' => 'required',
            'price_negotiable' => 'required',
            'video' => 'mimes:mp4,mov,ogg,qt'

        ];
        $msg = [
            'child_category_id' => 'Category',
            'location_id' => 'location',
            'floor_id' => 'floor',
            'road_size_id' => 'road size'
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            $errors = ValidatorHelper::validatorMessage($validator);

            return response()->json(['errors' => $errors], 422);
            // return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = auth('api')->user();
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
        // $information->water = $request->water;
        $information->location_for_map = $request->location_for_map;
        $information->overview = $request->overview;

        $information->category_id = $request->sub_category_id;
        $information->sub_category_id = $request->child_category_id;

        $information->province_id = $request->province_id;
        $information->district_id = $request->district_id;
        $information->municipality_id = $request->municipality_id;
        $information->woda_id = $request->woda_id;


        if ($request->featured_video) {
            $information = VideoHelper::saveVideoCode($information, $request);
        }


        $information->price = NumberHelper::unformatNumber($request->price);


        // $information->status =$request->status;

        $information->floor_id = $request->floor_id ?? null;


        if ($request->road_size_id) {
            $information->road_size_id = $request->road_size_id;
        }

        $information->location_id = $request->location_id;

        if ($request->hasFile('featured_photo')) {

            $old_file = public_path() . '/uploads/' . $information->featured_photo;

            if (File::exists($old_file)) {
                File::delete($old_file);
            }
            $file = $request->file('featured_photo');
            $extension = '.' . $request->file('featured_photo')->extension();
            $path = public_path() . '/uploads/';
            $filename = date('ymdhis') . $extension;
            $file->move($path, $filename);
            $information->featured_photo = $filename;
        }


        if ($request->hasFile('video')) {

            $old_file = public_path() . '/uploads/' . $information->video;

            if (File::exists($old_file)) {
                File::delete($old_file);
            }
            $file = $request->file('video');
            $extension = '.' . $request->file('video')->extension();
            $path = public_path() . '/uploads/';
            $filename = date('ymdhis') . $extension;
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


        $arr = [];
        if ($request->has('custom_field_identifier')) {
            $identifiers = $request->input('custom_field_identifier');
            $labels = $request->input('custom_field_label');
            $values = $request->input('custom_field_value');

            foreach ($identifiers as $index => $identifier) {
                $a = [
                    // 'identifier' => $identifier,
                    'identifier' => $identifiers[$index],
                    'label' => $labels[$index],
                    'value' => $values[$index]
                ];

                $arr[] = $a;
            }
        }

        $information->custom_fields = json_encode($arr);

        $information->status = $request->status ?? 0;

        $information->save();


        // save additonal features


        if ($request->feature_id) {
            for ($i = 0; $i < count($request->feature_id); $i++) {
                $additional_feature = new PropertyFeature();
                $additional_feature->property_id = $information->id;
                $additional_feature->feature_id = $request->feature_id[$i];
                $additional_feature->save();
            }
        }


        // upload multiple photos

        if ($request->photo) {

            foreach ($request->file('photo') as $imagefile) {

                $photo = new PropertyPhoto();

                $photo->property_id = $information->id;

                $extension = '.' . $imagefile->extension();

                $path = public_path() . '/uploads/';

                $filename = date('ymdhis') . rand() . $extension;

                $imagefile->move($path, $filename);

                $photo->photo = $filename;

                $photo->save();
            }
        }



        return response()->json(['status' => 'success', 'message' => 'Your Property Updated Successfully!!']);
    }


    public function destroy($id)
    {
        $user = auth('api')->user()->id;
        $information = Property::where('user_id',$user->id)->where('id',$id)
                        ->first();

        if(!$information){
            return response()->json(['status'=>'failed','message'=>'Property not found!!'],422);
        }

        $old_path = public_path() . '/uploads/' . $information->featured_photo;

        if (File::exists($old_path)) {
            File::delete($old_path);
        }


        $photos = PropertyPhoto::where('property_id', $id)->get();


        foreach ($photos as $value) {

            $old_path = public_path() . '/uploads/' . $value->photo;

            if (File::exists($old_path)) {
                File::delete($old_path);
            }

            $value->delete();
        }

        $information->delete();


        // if(!in_array(auth()->user()->role ,['admin','superadmin'])){

        //     return redirect()
        //     ->route('my-property.index', ['page_type' => 1])
        //     ->with('message', 'Your Property Listed Successfully!!');
        // }else{
        //     return redirect()
        //     ->route('property.index')
        //     ->with('message', 'Property Listed Successfully!!');



        // }

        return redirect()->back()
            ->with('error', 'Property Unlisted Successfully!!');
    }
}
