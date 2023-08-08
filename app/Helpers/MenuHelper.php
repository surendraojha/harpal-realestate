<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Models\MenuList;
use File;
use Image;

class MenuHelper
{


    public static function renderMenu(){

        $depth=1;

        $item = '<ul>';

        $menu = MenuList::where('depth',$depth)->get();


        foreach ($menu as $key => $value) {


            $sub_menu_1 = MenuList::where('parent',$value->id)->get();


            if($sub_menu_1->isEmpty()){

                $item .= "<li>".$value->label."</li>";

            }else{

                $item .= "<li>$value->label";
                $item .="<ul>";


                foreach ($sub_menu_1 as  $v) {

                    $sub_menu_2 = MenuList::where('parent',$v->id)->get();

                    if($sub_menu_2->isEmpty()){
                        $item .= "<li>".$v->label."</li>";

                    }else{
                        $item .= "<li>$v->label";

                        $item .= "<ul>";

                        foreach ($sub_menu_2 as $v1) {
                            $item .= "<li>".$v1->label."</li>";
                        }

                        $item .="</ul> </li>";
                    }


                }

                $item .="</ul></li>";


            }

        }

        $item .="</ul>";

        return $item;


    }



    public static function getSubmenu($id,$depth){









        $child = MenuList::where('parent',$id)->orderBy('sort')->get();

        $item ='';


        if($depth ==5){


            $information = MenuList::find($id);

            $item .= "<li>$information->label</li>";


            return $item;
        }

        if($child->isEmpty()){

            $information = MenuList::find($id);

            $item .= "<li>$information->label</li>";


            return $item;

            // $item .= "</ul>";

        }else{



            $item = "<ul>";

            foreach($child as $value){
                return $item = MenuHelper::getSubmenu($id,$value->depth+1);

            }

        }


        return $item;
    }


    public static function withChild(){

    }


    public static function withoutChild(){

    }

}

?>
