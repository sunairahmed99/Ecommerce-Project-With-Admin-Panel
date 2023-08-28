<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorymodel extends Model
{
    use HasFactory;

    protected $fillable = [
        'catnam_eng',
        'catname_urdu',
        'slug_eng',
        'slug_urdu',
        'cat_icon',
    ];
}
