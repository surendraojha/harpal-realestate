<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Models\Setting;
use Exception;
use File;
use Image;

class FileHelper
{
    public static function uploadImage($originalImage,$height=null,$width=null,$old_file){


        $path = public_path().'/uploads/';

        try{


        if($old_file){
            if(File::exists($path.$old_file)){
                File::delete($path.$old_file);
            }
        }


        $thumbnailImage = Image::make($originalImage);
        $originalPath = public_path() . '/uploads/';
        $image_name = time() . $originalImage->getClientOriginalName();
        $thumbnailImage->resize($height, $width, function ($constraint) {
            $constraint->aspectRatio();
        });
        $thumbnailImage->save($originalPath . $image_name);

                return $image_name;

        }catch(Exception $e){
            return null;
        }

    }

    public static function uploadImageWithWatermark($originalImage,$height=null,$width=null,$old_file){

        $path = public_path().'/uploads/';

        if($old_file){
            if(File::exists($path.$old_file)){
                File::delete($path.$old_file);
            }

        }

        $setting = Setting::first();

        try{


        $thumbnailImage = Image::make($originalImage);

        if(!$height && !$width){
            $height=100;
            $width=100;

        }


        if(!($height && $width)){
            $height_width = getimagesize($originalImage);
            $width = 1200;
            $height = null;
        }

        $originalPath = public_path() . '/uploads/';
        $image_name = time() .rand(). $originalImage->getClientOriginalName();



        // $thumbnailImage->resize($height, $width, function ($constraint) {
        //     $constraint->aspectRatio();
        // });

        $watermark_path = public_path().'/uploads/'.$setting->watermark;
        $watermarkImg=Image::make($watermark_path);
        $wmarkWidth=$watermarkImg->width();
        $wmarkHeight=$watermarkImg->height();




        $thumbnailImage->insert(public_path().'/uploads/'.$setting->watermark, 'center', 10,10);

        $thumbnailImage->save($originalPath . $image_name);

                return $image_name;

        }catch(Exception $e){
            return null;
        }
    }


    public static function uploadFile($file,$old_file=null){

        $path = public_path().'/uploads/';


        if(File::exists($path.$old_file)){
            File::delete($path.$old_file);
        }

        $extension = '.'.$file->extension();
        $filename = date('ymdhis').$extension;
        $file->move($path, $filename);

        return $filename;
    }
}
