<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(ArticleController::class)->group(function () {
    //新增文章
    Route::post('/post/article', 'postArticle')->name('postArticle');
    //刪除文章
    Route::delete('/delete/article', 'deleteArticle')->name('deleteArticle');
    //查詢文章
    Route::get('/select/article', 'getArticle')->name('getArticle');
});

