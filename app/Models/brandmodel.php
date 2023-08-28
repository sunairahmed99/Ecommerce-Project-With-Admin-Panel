<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brandmodel extends Model
{
    use HasFactory;

    protected $fillable = [

        'name_eng',
        'slug_eng',
        'name_urdu',
        'slug_urdu',
        'image',

    ];
}
