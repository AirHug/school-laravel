<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Resource;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{

    /**
     * Show ListView
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $keyWord = is_null($request->input('keywords')) ? "" : $request->input('keywords');
        $numPerPage = is_null($request->input('numPerPage')) ? 20 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));

        $resources = Resource::where('title', 'like', "%" . $keyWord . "%")
            ->orderBy('id', 'asc')
            ->paginate($numPerPage);

        $count = Resource::where('title', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'resources' => $resources,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('teacher.resource.show', $result);
    }

    /**
     * Add DataView
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function add()
    {
        return view('teacher.resource.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Request $request)
    {
        $resource = Resource::find($request->query("id"));
        return view('teacher.resource.edit', compact("resource"));
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function delete(Request $request)
    {
        $flag = Resource::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'resourceView',
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
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function data(Request $request)
    {
        try {
            $resource = new Resource();
            if ($request->input("id") != "-1") $resource = Resource::find($request->input("id"));
            $resource->title=$request->input("title");
            $resource->content=$request->input("content");
            $resource->fileName=$request->input("fileName");
            $resource->file = time(Carbon::now()) . "." . $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move('files/resource', $resource->file);
            $resource->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '操作成功！',
                'navTabId' => 'resourceView',
                'rel' => '',
                'callbackType' => 'closeCurrent',
                'forwardUrl' => ''
            ]);
        }catch(\Exception $e){
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
            $resource = Resource::find($request->query("id"));
            $resource->isPass = true;
            $resource->checker = Auth::user()->name;
            $resource->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '审核通过！',
                'navTabId' => 'resourceView',
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
