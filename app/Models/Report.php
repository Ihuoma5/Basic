<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function state(){
        return $this->belongsTo(State::class,'state_id','id');
    }


     public function device(){
        return $this->belongsTo(Device::class,'device_id','id');
    }
}
