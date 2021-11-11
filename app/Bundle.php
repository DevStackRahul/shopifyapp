<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
   protected $table = 'bundles';
   
    protected $fillable = [
        'id','bundle_name', 'bundle_product_name','bundle_product_id','bundle_product_img','bundle_product_title','notes','bundle_token','store_name',
    ];
}
