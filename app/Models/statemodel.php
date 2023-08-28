<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\shippingmodel;
use App\Models\areamodel;

class statemodel extends Model
{
    use HasFactory;

    public function dis(){
        return $this->belongsTo(shippingmodel::class,'dis_id', 'id');
    }

    public function area(){
        return $this->belongsTo(areamodel::class,'area_id', 'id');
    }
}
