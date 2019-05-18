<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';

    protected $fillable=[
        'id', 'name', 'description','count','img', 'brand', 'price', 'category_id', 'created_at', 'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function product_translation()
    {
        return $this->hasMany('App\Models\ProductTranslation', 'products_id', 'id');
    }

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany('App\Models\ProductTranslation', 'products_id', 'id')
        ->where('lang', '=', $language)->first();
    }
}