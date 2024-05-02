<?php

namespace App\Services;

use Exception;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\ArticleTranslation;

class ArticleService
{
    /**
     * 新增文章
     * @param  ArticleRequest  $request
     *
     */
    public function store(ArticleRequest $request)
    {
        $id = $request->input('id');
        $language_code = $request->input('language_code');
        $title = $request->input('title');
        $content = $request->input('content');

        DB::beginTransaction();
        try {
            $article = Article::find($id);
            if (is_null($article)) {
                Article::create([
                    'id'  => $id,
                ]);
            }
            ArticleTranslation::create([
                'article_id'  => $id,
                'language_code' => $language_code,
                'title' => $title,
                'content' => $content,
            ]);
            DB::commit();
            return response()->json([
                'message' => 'Article created successfully'
            ], 200);
        } catch (Exception $exception) {
            DB::rollBack();
            $this->logDatabaseError($exception);
            return response()->json([
                'message' => '錯誤'
            ], 500);
        }
    }

    /**
     * 刪除文章
     * @param  ArticleRequest  $request
     *
     */
    public function delete(ArticleRequest $request)
    {
        $id = $request->input('id');
        DB::beginTransaction();
        try {
            Article::where('id', $id)->delete();
            DB::commit();
            return response()->json([
                'message' => 'Article deleted successfully'
            ], 200);
        } catch (Exception $exception) {
            DB::rollBack();
            $this->logDatabaseError($exception);
            return response()->json([
                'message' => '錯誤'
            ], 500);
        }
    }

    /**
     * 查詢文章
     * @param  ArticleRequest  $request
     *
     */
    public function select(ArticleRequest $request)
    {
        $id = $request->input('id');

        DB::beginTransaction();
        try {
            $article = Article::where('id', $id)->with(['getArticles'])->get();
            DB::commit();
            return response()->json([
                'message' => 'Article selected successfully',
                'data'    => $article
            ], 200);
        } catch (Exception $exception) {
            DB::rollBack();
            $this->logDatabaseError($exception);
            return response()->json([
                'message' => '錯誤'
            ], 500);
        }
    }
}
