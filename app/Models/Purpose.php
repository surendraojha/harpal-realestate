<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function property(){
        return $this->hasMany(Property::class,'purpose_id');
    }
}
