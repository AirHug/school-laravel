<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Banner;
use App\Http\Requests;

class BannerController extends Controller
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

        $banners = Banner::where('title', 'like', "%" . $keyWord . "%")
            ->orderBy('index', 'asc')
            ->paginate($numPerPage);

        $count = Banner::where('title', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'banners' => $banners,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('teacher.banner.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        return view('teacher.banner.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $banner = Banner::find($request->query("id"));
        return view('teacher.banner.edit', compact("banner"));
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Banner::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'bannerView',
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
            $banner = new Banner();
            if ($request->input("id") != "-1") $banner = Banner::find($request->input("id"));
            $banner->title = $request->input("title");
            $banner->link = $request->input("link");
            $banner->index = $request->input("index");
            if ($request->hasFile("image")) {
                $banner->image = time(Carbon::now()) . "." . $request->file("image")->getClientOriginalExtension();
                $request->file("image")->move('files\\banner', $banner->image);
            }
            $banner->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '添加成功！',
                'navTabId' => 'bannerView',
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
}
