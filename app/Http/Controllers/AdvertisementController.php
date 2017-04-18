<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Advertisement;
use App\Http\Requests;

class AdvertisementController extends Controller
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

        $ads = Advertisement::where('title', 'like', "%" . $keyWord . "%")
            ->orderBy('id', 'asc')
            ->paginate($numPerPage);

        $count = Advertisement::where('title', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'ads' => $ads,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('teacher.advertisement.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        return view('teacher.advertisement.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $advertisement = Advertisement::find($request->query("id"));
        return view('teacher.advertisement.edit', compact("advertisement"));
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Advertisement::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'advertisementView',
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
            $advertisement = new Advertisement();
            if ($request->input("id") != "-1") $advertisement = Advertisement::find($request->input("id"));
            $advertisement->title = $request->input("title");
            $advertisement->link = $request->input("link");
            if ($request->hasFile("image")) {
                $advertisement->image = time(Carbon::now()) . "." . $request->file("image")->getClientOriginalExtension();
                $request->file("image")->move('files/advertisement', $advertisement->image);
            }
            $advertisement->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '操作成功！',
                'navTabId' => 'advertisementView',
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
