<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'id',
    ];

    /**
     * 查詢文章
     * @return HasMany|object|null
     */
    public function getArticles()
    {
        return $this->hasMany('App\Models\ArticleTranslation', 'article_id', 'id');
    }
}
