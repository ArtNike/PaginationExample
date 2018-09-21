<?php

namespace App\Http\Controllers\API;

use App\Article;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * @SWG\Get(
     *        path="/articles/{page_id}",
     *        tags={"articles"},
     *        operationId="getArticlesPage",
     *        summary="Get some articles",
     *        produces={"application/json"},
     * 		@SWG\Parameter(
     *            name="page_id",
     *            in="path",
     *            required=true,
     *            type="number",
     *            description="Number of articles page",
     *            default=1,
     *        ),
     * 		@SWG\Response(
     *            description="success",
     *            response=200,
     *        ),

     *    )
     */

    public function getUnsorted($pageIndex)
    {
        if (is_numeric($pageIndex) && $pageIndex > 0) {
            $articlesCount = Article::count();
            $onPage = 5;
            $pageCount = ceil($articlesCount / $onPage);
            if ($pageIndex <= $pageCount) {
                $articles = Article::orderBy('id', 'desc')->skip($onPage * ($pageIndex - 1))->take($onPage)->select('id', 'title', 'content', 'image', 'url', 'created_at')->get();
                return response()->json(['status' => true, 'total_pages' => $pageCount, 'articles' => $articles]);
            }
            return response()->json(['status' => false]);
        }
        return response()->json(['status' => false]);
    }
}
