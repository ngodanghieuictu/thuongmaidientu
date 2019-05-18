<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $table = 'productTranslation';
    protected $fillable = [
        'product_id',
        'lang',
        'name',
        'brand',
        'description'
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
