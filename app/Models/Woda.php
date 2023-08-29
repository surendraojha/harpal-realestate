<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woda extends Model
{
    use HasFactory;

    protected $table="wodas";

    public function municipality(){
        return $this->belongsTo(Municipality::class,'municipality_id');
    }
}
