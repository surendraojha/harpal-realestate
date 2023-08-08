<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use File;
use Image;

class VideoHelper
{
    public static function youtubelink($link){
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        $youtube_id='';
       if (preg_match($longUrlRegex, $link, $matches)) {
           $youtube_id = $matches[count($matches) - 1];
       }

       if (preg_match($shortUrlRegex, $link, $matches)) {
           $youtube_id = $matches[count($matches) - 1];
       }

       return "https://www.youtube.com/embed/$youtube_id";
    }

    public static function saveVideoCode($information,$request){

        parse_str( parse_url( $request->featured_video, PHP_URL_QUERY ), $my_array_of_vars );


        if(is_array($my_array_of_vars)){

                  if(@$my_array_of_vars['v']){
                $information->featured_video = $request->featured_video;

                $information->video_code = $my_array_of_vars['v'];


            }
        }else{
            $information->featured_video = null;

            $information->video_code = null;
        }

        return $information;
    }
}
