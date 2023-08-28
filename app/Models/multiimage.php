<?php

namespace App\Models;
use App\Models\productmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multiimage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo(productmodel::class,'pro_id', 'id');
    }
}
