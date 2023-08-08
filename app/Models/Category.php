<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'parent');
    }


    public function subcategory(){
        return $this->hasMany(Category::class,'parent');

    }


    public function property(){
        return $this->hasMany(Property::class,'category_id')->where('status','!=',0);
    }

    public function getStatus(){
        if($this->status==0){
            return 'InActive';
        }else{
            return 'Active';
        }
    }
    // public function homePageProduct(){

    // }
}
