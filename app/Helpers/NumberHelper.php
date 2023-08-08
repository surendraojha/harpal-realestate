<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use File;
use Image;

class NumberHelper
{
   public static function unformatNumber($number){

    $number =str_replace( ',', '', $number );;

    $number = (int) $number;

    // dd($number);
        return $number;
   }

   public static function formatnumber($string){

    $reverse_string = strrev($string);

    $array = str_split($reverse_string);

    $count =0;
    $new_number='';
    foreach ($array as $key => $value) {

        if($count==3){
            $new_number.=',';

        }

        if($count==5){
            $new_number.=',';

        }


        if($count==7){
            $new_number.=',';

        }


        if($count==9){
            $new_number.=',';

        }

        if($count==11){
            $new_number.=',';

        }

         if($count==13){
            $new_number.=',';

        }


         if($count==15){
            $new_number.=',';

        }

        if($count==17){
            $new_number.=',';

        }

        $new_number.= $value;

        $count++;
    }


    return strrev($new_number);

}

}
