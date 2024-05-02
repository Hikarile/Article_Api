<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    private $articleService;

    public function __construct(ArticleService $service)
    {
        $this->articleService = $service;
    }

    /**
     * 新增文章
     * @param  ArticleRequest  $request
     *
     */
    public function postArticle(ArticleRequest $request)
    {
        return $this->articleService->store($request);     
    }

    /**
     * 刪除文章
     * @param  ArticleRequest  $request
     *
     */
    public function deleteArticle(ArticleRequest $request)
    {
        return $this->articleService->delete($request);      
    }

    /**
     * 查詢文章
     * @param  ArticleRequest  $request
     *
     */
    public function selectArticle(ArticleRequest $request)
    {
        return $this->articleService->select($request);        
    }
}
