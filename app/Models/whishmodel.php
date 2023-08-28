<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\productmodel;
use App\Models\User;
class whishmodel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pro(){
        return $this->belongsTo(productmodel::class,'pro_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
