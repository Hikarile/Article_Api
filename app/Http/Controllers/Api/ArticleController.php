<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * 新增文章
     * @param  Request  $request  :{"StoreId": "111119",“OrderNo": QRCode中的唯一值}
     *
     */
    public function postArticle(Request $request)
    {
        return 'postArticle';        
    }

    /**
     * 刪除文章
     * @param  Request  $request  :{"StoreId": "111119",“OrderNo": QRCode中的唯一值}
     *
     */
    public function deleteArticle(Request $request)
    {
        return 'deleteArticle';        
    }

    /**
     * 查詢文章
     * @param  Request  $request  :{"StoreId": "111119",“OrderNo": QRCode中的唯一值}
     *
     */
    public function getArticle(Request $request)
    {
        return 'getArticle';        
    }
}
