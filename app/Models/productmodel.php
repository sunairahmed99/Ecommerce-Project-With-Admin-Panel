<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categorymodel;
use App\Models\subcatmodel;
use App\Models\brandmodel;
use App\Models\Subsubmodel;

class productmodel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function catname(){
        return $this->belongsTo(categorymodel::class,'cat_id','id');
    }

    public function subcat(){
        return $this->belongsTo(subcatmodel::class,'sub_id','id');
    }

    public function Subsub(){
        return $this->belongsTo(Subsubmodel::class,'Subsub_id','id');
    }

    protected $fillable = [

        'brand_id',
        'cat_id',
        'sub_id',
        'Subsub_id',
        'proname_eng',
        'proname_urdu',
        'slug_eng',
        'slug_urdu',
        'pro_code',
        'pro_qty',
        'protags_eng',
        'protags_urdu',
        'prosize_eng',
        'prosize_urdu',
        'procolor_eng',
        'procolor_urdu',
        'selling_price',
        'discount_price',
        'shortdesc_eng',
        'shortdesc_urdu',
        'longdesc_eng',
        'longdesc_urdu',
        'pro_thumbnail',
        'hot_deals',
        'featured',
        'special_offer',
        'special_deal',
        'status',

    ];

    public function category(){
        return $this->belongsTo(categorymodel::class, 'cat_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(brandmodel::class, 'brand_id', 'id');
    }
}
