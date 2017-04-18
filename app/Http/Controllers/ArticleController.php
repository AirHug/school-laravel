<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Catalog;
use App\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    /**
     * Show ListView
     *
     * @param Request $request
     * @return response
     */
    public function show(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $keyWord = is_null($request->input('keywords')) ? "" : $request->input('keywords');
        $numPerPage = is_null($request->input('numPerPage')) ? 20 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));

        $articles = Article::where('title', 'like', "%" . $keyWord . "%")
            ->orderBy('publish_at', 'desc')
            ->paginate($numPerPage);

        $count = Article::where('title', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'articles' => $articles,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('teacher.article.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        $catalogs = Catalog::where("article_id", 0)
            ->where("url", "")
            ->get();
        return view('teacher.article.add', compact("catalogs"));
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $catalogs = Catalog::where("article_id", 0)
            ->where("url", "")
            ->get();
        $article = Article::find($request->query("id"));

        $result = [
            'catalogs' => $catalogs,
            'article' => $article
        ];
        return view('teacher.article.edit', $result);
    }

    /**
     * Delete Data
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Article::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'articleView',
                'rel' => '',
                'callbackType' => '',
                'forwardUrl' => ''
            ]);
        } else {
            return response()->json([
                'statusCode' => '300',
                'message' => '操作失败！'
            ]);
        }
    }

    /**
     * Add Data
     *
     * @param Request $request
     * @return response
     */
    public function data(Request $request)
    {
        try {
            $article = new Article();
            if ($request->input("id") != "-1") $article = Article::find($request->input("id"));
            $article->title = $request->input("title");
            $article->author = $request->input("author");
            $article->editor = $request->input("editor");
            $article->catalog = $request->input("catalog");
            $article->resource = $request->input("resource");
            $article->keyword = $request->input("keyword");
            $article->fileName = $request->input("fileName");
            if (strlen($request->input("publish_at")) > 0) $article->publish_at = $request->input("publish_at");
            else $article->publish_at = Carbon::now();
            $article->isTop = $request->input("isTop");
            $article->isCommand = $request->input("isCommand");
            $article->isSpecial = $request->input("isSpecial");
            $article->content = $request->input("content");
            if ($request->hasFile("file")) {
                $article->file = time(Carbon::now()) . "." . $request->file("file")->getClientOriginalExtension();
                $request->file("file")->move('files/article', $article->file);
            }
            if ($request->hasFile("image")) {
                $article->image = time(Carbon::now()) . "." . $request->file("image")->getClientOriginalExtension();
                $request->file("image")->move('files/article', $article->image);
            }
            $article->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '添加成功！',
                'navTabId' => 'articleView',
                'rel' => '',
                'callbackType' => 'closeCurrent',
                'forwardUrl' => ''
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'statusCode' => '300',
                'message' => '操作失败！'
            ]);
        }
    }

    /**
     * Pass
     *
     * @param Request $request
     * @return response
     */
    public function pass(Request $request)
    {
        try {
            $article = Article::find($request->query("id"));
            $article->isPass = true;
            $article->checker = Auth::user()->name;
            $article->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '审核通过！',
                'navTabId' => 'articleView',
                'rel' => '',
                'callbackType' => '',
                'forwardUrl' => ''
            ]);
        }catch(\Exception $e){
            return response()->json([
                'statusCode' => '300',
                'message' => '操作失败！'
            ]);
        }
    }
}
