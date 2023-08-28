<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categorymodel;

class subcatmodel extends Model
{
    use HasFactory;

    protected $fillable = [

        'subcatname_eng',
        'subcatname_urdu',
        'slug_eng',
        'slug_urdu',

    ];

    public function category(){
        return $this->belongsTo(categorymodel::class, 'cat_id', 'id');
    }
}
