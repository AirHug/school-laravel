<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Notice;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
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

        $notices = Notice::where('title', 'like', "%" . $keyWord . "%")
            ->orderBy('publish_at', 'desc')
            ->paginate($numPerPage);

        $count = Notice::where('title', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'notices' => $notices,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('teacher.notice.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        return view('teacher.notice.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $notice = Notice::find($request->query("id"));

        $result = [
            'notice' => $notice
        ];
        return view('teacher.notice.edit', $result);
    }

    /**
     * Delete Data
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Notice::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'noticeView',
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
            $notice = new Notice();
            if ($request->input("id") != "-1") $notice = Notice::find($request->input("id"));
            $notice->title = $request->input("title");
            $notice->content = $request->input("content");
            $notice->author = $request->input("author");
            $notice->fileName = $request->input("fileName");
            if (strlen($request->input("publish_at")) > 0) $notice->publish_at = $request->input("publish_at");
            else $notice->publish_at = Carbon::now();
            if ($request->hasFile("file")) {
                $notice->file = time(Carbon::now()) . "." . $request->file("file")->getClientOriginalExtension();
                $request->file("file")->move('files/notice', $notice->file);
            }
            $notice->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '添加成功！',
                'navTabId' => 'noticeView',
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
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function pass(Request $request)
    {
        try {
            $notice = Notice::find($request->query("id"));
            $notice->isPass = true;
            $notice->checker = Auth::user()->name;
            $notice->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '审核通过！',
                'navTabId' => 'noticeView',
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
