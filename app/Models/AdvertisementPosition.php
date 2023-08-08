<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementPosition extends Model
{
    use HasFactory;

    public function advertisement(){
        return $this->belongsTo(Advertisement::class,'advertisement_id');
    }
}
