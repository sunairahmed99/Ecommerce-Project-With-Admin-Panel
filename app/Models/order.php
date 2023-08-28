<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\shippingmodel;
use App\Models\areamodel;
use App\Models\statemodel;
use App\Models\usermodel;
use App\Models\productmodel;

class order extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function division(){
        return $this->belongsTo(areamodel::class,'division_id','id');
    }

    public function district(){
        return $this->belongsTo(shippingmodel::class,'district_id','id');
    }

    public function state(){
        return $this->belongsTo(statemodel::class,'state_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

   



}
