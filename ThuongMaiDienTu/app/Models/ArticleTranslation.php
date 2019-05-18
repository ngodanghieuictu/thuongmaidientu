<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    protected $table = 'article_translations';

    protected $fillable = [
        'article_id',
        'lang',
        'title',
        'brief',
        'content',
    ];

    public function article(){
        return $this->belongsTo('App\Models\Article');
    }
}
