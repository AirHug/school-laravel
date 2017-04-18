<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Http\Requests;

class LinkController extends Controller
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

        $links = Link::where('title', 'like', "%" . $keyWord . "%")
            ->orderBy('index')
            ->paginate($numPerPage);

        $count = Link::where('title', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'links' => $links,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('teacher.link.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        return view('teacher.link.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $link = Link::find($request->query("id"));
        return view('teacher.link.edit', compact("link"));
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Link::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'linkView',
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
        $link = new Link();
        if ($request->input("id") != "-1") $link = Link::find($request->input("id"));
        $link->title = $request->input("title");
        $link->url = $request->input("url");
        $link->index = $request->input("index");
        $link->save();
        return response()->json([
            'statusCode' => '200',
            'message' => '操作成功！',
            'navTabId' => 'linkView',
            'rel' => '',
            'callbackType' => 'closeCurrent',
            'forwardUrl' => ''
        ]);
    }
}
