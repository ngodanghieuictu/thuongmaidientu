<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $table = 'articles';

    protected $fillable = [
        'slug',
        'category_id',
        'author',
        'photo',
        'status',
        'views',
        'source',
        'created_at',
        'updated_at',
    ];

    const STATUS = [0=>'Unpublished', 1=>'Published'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function article_translation()
    {
        return $this->hasMany('App\Models\ArticleTranslation', 'article_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'author', 'id')->first();
    }

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany('App\Models\ArticleTranslation', 'article_id', 'id')
        ->where('lang', '=', $language)->first();
    }

    public static function search($k = null){

        $articles = self::select('articles.id', 'at.title', 'articles.source',
            'articles.views', 'articles.status', 'u.first_name')
        ->join('users AS u', 'u.id', 'articles.author')
        ->leftJoin('article_translations AS at', function($join){
            $join->on('articles.id', '=', 'at.article_id')
            ->where('at.lang', '=', app()->getLocale());
        })->orderBy('articles.id', 'DESC');

        if($k){
            $articles = $articles
            ->where(function($query) use($k){
                $query->where('at.title', 'like', "%$k%")
                ->orwhere('at.brief', 'like', "%$k%");
            });
        }

        return $articles->paginate(config('constant.ADMIN_PAGE'));
    }
}
