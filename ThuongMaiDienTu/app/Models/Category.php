<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use DB;
class Category extends Model
{
    
    protected $table = 'categories';
    protected $fillable =[
        'id',
        'name', 
        'image', 
        'link', 
        'created_at', 
        'updated_at'
    ];
    public function category_translation()
    {
        return $this->hasMany('App\Models\CategoryTranslation', 'category_id', 'id');
    }

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany('App\Models\CategoryTranslation', 'category_id', 'id')
        ->where('lang', '=', $language)->first();
    }
    public static function sub_category($id){
        return DB::table('categories')->where('parent', '$id');
    }
}



