<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productmodel;

class orderItem extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function product(){
        return $this->belongsTo(productmodel::class,'product_id','id');
    }
}
