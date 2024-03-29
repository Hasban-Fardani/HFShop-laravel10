<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpeditionPrice extends Model
{
    use HasFactory;
    public function expedition(){
        return $this->belongsTo(Expedition::class);
    }
    public function city_from(){
        return $this->belongsTo(City::class);
    }
    public function city_to(){
        return $this->belongsTo(City::class);
    }
}
