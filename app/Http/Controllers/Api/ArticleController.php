<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    /**
     * @OA\Info(
     *     title="Your API Title",
     *     version="1.0.0",
     *     description="Your API Description"
     * )
     */

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
    /**
     * @OA\Post(
     *     path="/api/post/article",
     *     summary="Create a new article",
     *     tags={"postArticle"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id", "language_code", "title", "content"},
     *             @OA\Property(property="id", type="int", example=1),
     *             @OA\Property(property="language_code", type="string", example="en"),
     *             @OA\Property(property="title", type="string", example="Sample Title"),
     *             @OA\Property(property="content", type="string", example="Sample Content")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Article created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Article created successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid"),
     *             @OA\Property(property="errors", type="object", example={
     *                 "id": {"Article ID is required."},
     *                 "id": {"Article ID must be a numeric."},
     *                 "language_code": {"Language code is required."},
     *                 "language_code": {"Language code must be a string."},
     *                 "language_code": {"language code must be either `en`, `zh`, or `ja`."},
     *                 "title": {"Title is required."},
     *                 "title": {"Title must be a string."},
     *                 "title": {"Title may not be greater than 20 characters."},
     *                 "content": {"Content is required."},
     *                 "content": {"Content must be a string."},
     *             })
     *         )
     *     ),
     * )
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
    /**
     * @OA\Post(
     *     path="/api/delete/article",
     *     summary="Delete a new article",
     *     tags={"deleteArticle"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id"},
     *             @OA\Property(property="id", type="int", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Article deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Article deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid"),
     *             @OA\Property(property="errors", type="object", example={
     *                 "id": {"Article ID is required."},
     *                 "id": {"Article ID must be a numeric."},
     *                 "id": {"Article ID does not exist."},
     *             })
     *         )
     *     ),
     * )
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
    /**
     * @OA\Post(
     *     path="/api/select/article",
     *     summary="Selected a new article",
     *     tags={"selectArticle"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id"},
     *             @OA\Property(property="id", type="int", example=1),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Article selected successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Article selected successfully"),
     *             @OA\Property(property="data", type="object", example={
     *                 "id": 1,
     *                 "created_at": "2024-05-02T02:14:35.000000Z",
     *                 "updated_at": "2024-05-02T02:14:35.000000Z",
     *                 "get_articles": {
     *                     {
     *                         "id": 1,
     *                         "article_id": 1,
     *                         "language_code": "en",
     *                         "title": "text_title",
     *                         "content": "test_content",
     *                         "created_at": "2024-05-02T02:14:35.000000Z",
     *                         "updated_at": "2024-05-02T02:14:35.000000Z"
     *                     },
     *                     {
     *                         "id": 2,
     *                         "article_id": 1,
     *                         "language_code": "ja",
     *                         "title": "text_title",
     *                         "content": "test_content",
     *                         "created_at": "2024-05-02T02:14:35.000000Z",
     *                         "updated_at": "2024-05-02T02:14:35.000000Z"
     *                     }
     *                 }
     *             })
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid"),
     *             @OA\Property(property="errors", type="object", example={
     *                 "id": {"Article ID is required."},
     *                 "id": {"Article ID must be a numeric."},
     *                 "id": {"Article ID does not exist."},
     *             })
     *         )
     *     ),
     * )
     */
    public function selectArticle(ArticleRequest $request)
    {
        return $this->articleService->select($request);        
    }
}
