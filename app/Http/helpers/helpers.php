<?php

use App\Models\Category;
use App\Models\Property;

    function propertyByMainCategory($main_category_id,$limit=10,$type='limit'){

        $all_ids = getAllCategoryIds($main_category_id);

        $informations = Property::whereIn('sub_category_id',$all_ids)
                        ->orderBy('id','DESC')
                        ->where('status',1);



        if($type=='limit'){
            $informations = $informations->limit($limit)->get();
        }else{
            $informations = $informations->paginate($limit);

        }


        return $informations;

    }




    function getAllCategoryIds($mainCategoryId = null) {
        $categoryIds = [];

        if ($mainCategoryId === null) {
            // Get main categories

            $mainCategories = Category::where('parent', null)->get();

            foreach ($mainCategories as $mainCategory) {
                $categoryIds[] = $mainCategory->id;
                $categoryIds = array_merge($categoryIds, getAllCategoryIds($mainCategory->id));
            }
        } else {
            // Get subcategories and sub-subcategories
            $subcategories = Category::where('parent', $mainCategoryId)->get();

            foreach ($subcategories as $subcategory) {
                $categoryIds[] = $subcategory->id;
                $categoryIds = array_merge($categoryIds, getAllCategoryIds($subcategory->id));
            }
        }

        return $categoryIds;
    }

