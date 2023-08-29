<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    protected $table="municipalities";

    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
}
