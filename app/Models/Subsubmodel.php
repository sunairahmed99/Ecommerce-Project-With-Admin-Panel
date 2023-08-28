<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categorymodel;
use App\Models\subcatmodel;

class Subsubmodel extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(categorymodel::class, 'cat_id', 'id');
    }

    public function subcat(){

        return $this->belongsTo(subcatmodel::class, 'sub_id', 'id');

    }
}
