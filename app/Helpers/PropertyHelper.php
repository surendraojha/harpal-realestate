<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Models\Setting;
use Exception;
use File;
use Image;

class PropertyHelper
{

    public static function residentalPropertyValidation(){

        return [
            'purpose_id'=>'required',
            'title'=>'required',
            'price'=>'required',
            'price_negotiable'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            // 'date_of_build'=>'required',
            // 'bedroom'=>'required',
            // 'kitchen'=>'required',
            // 'bathroom'=>'required',
            // 'furnishing'=>'required',
            // 'faced'=>'required',
            // 'parking'=>'required',
            // 'balcony'=>'required',
            // 'floor_id'=>'required',
            // 'road_size_id'=>'required',
            // 'water'=>'required',
            'contact_number'=>'required|max:20',
            'location_id'=>'required',
        ];


    }



     public static function commericialPropertyValidation(){

        return [
             'purpose_id'=>'required',
            'title'=>'required|max:100',
            'price'=>'required',
            'price_negotiable'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            // 'parking'=>'required',
            // 'floor_id'=>'required',
            // 'road_size_id'=>'required',
            // 'pantry'=>'required',
            // 'bathroom'=>'required',
            // 'faced'=>'required',
            // 'lift'=>'required',
            'contact_number'=>'required|max:20',
            'location_id'=>'required',
            // 'date_of_build'=>'required'
        ];


    }


    public static function redirectionPath($information){
         if($information->status==0){
            $url ='my-property?page_type=1';
        }elseif($information->status==1){
            $url ='my-property?page_type=2';

        }else{
            $url ='my-property?page_type=3';
        }

        return $url;
    }


}
