<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => 'integer' // or float as per your values
     ];

    public function purpose(){
        return $this->belongsTo(Purpose::class,'purpose_id');

    }
    public function location(){
        return $this->belongsTo(Location::class,'location_id');
    }

    public function floor(){
        return $this->belongsTo(Floor::class);
    }

    public function subcategory(){
        return $this->belongsTo(Category::class,'sub_category_id');
    }


    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function roadSize(){
        return $this->belongsTo(RoadSize::class);
    }


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function photo(){
        return $this->hasMany(PropertyPhoto::class,'property_id');
    }

    public function boostPost(){
        return $this->hasOne(BoostPost::class,'property_id');
    }


    public function wishlist(){
        return $this->hasMany(WishList::class,'property_id');

    }
}
