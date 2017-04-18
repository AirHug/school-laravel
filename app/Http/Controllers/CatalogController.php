<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Catalog;
use App\Http\Requests;

class CatalogController extends Controller
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

        $catalogs = Catalog::where('name', 'like', "%" . $keyWord . "%")
            ->where('pid', 0)
            ->orderBy('id', 'asc')
            ->paginate($numPerPage);

        $count = Catalog::where('name', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'catalogs' => $catalogs,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('teacher.catalog.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        //顶级一般栏目
        $topCatalogs = Catalog::where("pid", 0)
            ->where("article_id", 0)
            ->where("url", "")
            ->get();
        return view('teacher.catalog.add', compact("topCatalogs"));
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $catalog = Catalog::find($request->query("id"));
        //顶级非本身非父级一般栏目
        $topCatalogs = Catalog::where("pid", 0)
            ->where("id", "!=", $catalog->id)
            ->where("article_id", 0)
            ->where("url", "");
        if ($catalog->pid != 0) {
            $topCatalogs->where("id", "!=", $catalog->parentCatalog->id);
        }
        $topCatalogs->get();

        $parameter = [
            'topCatalogs' => $topCatalogs,
            'catalog' => $catalog
        ];

        return view('teacher.catalog.edit', $parameter);
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Catalog::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'catalogView',
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
            $catalog = new Catalog();
            if ($request->input("id") != "-1") $catalog = Catalog::find($request->input("id"));
            $catalog->name = $request->input("name");
            $catalog->pid = $request->input("pid");
            $request->input("pid") == "0" ? $catalog->isShow = $request->input("isShow") : $catalog->isShow = false;
            $catalog->abstract = $request->input("abstract");
            switch ($request->input("channelType")) {
                case "1":
                    $catalog->article_id = $request->input("article_id");
                    $catalog->url = "";
                    break;
                case "2":
                    $catalog->url = $request->input("url");
                    $catalog->article_id = 0;
                    break;
                default:
                    break;
            }
            if ($request->hasFile("image")) {
                $catalog->image = time(Carbon::now()) . "." . $request->file("image")->getClientOriginalExtension();
                $request->file("image")->move('files/catalog', $catalog->image);
            }
            $catalog->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '操作成功！',
                'navTabId' => 'catalogView',
                'rel' => '',
                'callbackType' => 'closeCurrent',
                'forwardUrl' => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => '300',
                'message' => '操作失败！'
            ]);
        }
    }
}
