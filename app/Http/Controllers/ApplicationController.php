<?php

namespace App\Http\Controllers;

use App\ApplicationDetail;
use App\Teacher;
use Illuminate\Http\Request;
use App\Application;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
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
        $request->merge(array('page' => $pageNum));
        $numPerPage = is_null($request->input('numPerPage')) ? 20 : $request->input('numPerPage');

        $teacher_key = is_null($request->input('teacher_id')) ? null : Teacher::find($request->input('teacher_id'));

        $applications = Application::orderBy('id', 'desc');
        if (!is_null($teacher_key)) $applications->where("creator", $teacher_key->id);
        $count = $applications->count();
        $applications = $applications->paginate($numPerPage);

        $result = [
            'applications' => $applications,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'teacher' => $teacher_key,
            'totalCount' => $count
        ];

        return view('teacher.application.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        return view('teacher.application.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function info(Request $request)
    {
        $application = Application::find($request->query("id"));
        return view('teacher.application.info', compact("application"));
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Application::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'applicationView',
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
            if (count($request->input("asset_look_id")) > 0) {

                $application = new Application();
                $application->creator = Auth::guard("teachers")->user()->id;
                $application->type = $request->input("type");
                $application->save();

                for ($i = 0; $i < count($request->input("asset_look_id")); ++$i) {
                    $detail = new ApplicationDetail();
                    $detail->application_id = $application->id;
                    $detail->asset_id = $request->input("asset_look_id")[$i];
                    $detail->count = $request->input("asset_count")[$i];
                    $detail->save();
                }

                return response()->json([
                    'statusCode' => '200',
                    'message' => '添加成功！',
                    'navTabId' => 'applicationView',
                    'rel' => '',
                    'callbackType' => 'closeCurrent',
                    'forwardUrl' => ''
                ]);
            } else {
                return response()->json([
                    'statusCode' => '300',
                    'message' => '请求中必须有申请项目！'
                ]);
            }
        } catch (\Exception $e) {
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
            $application = Application::find($request->query("id"));
            if ($application->isSatisfied()) {
                $application->status = true;
                $application->checker = Auth::user()->name;
                $application->save();
                return response()->json([
                    'statusCode' => '200',
                    'message' => '审核通过！',
                    'navTabId' => 'applicationView',
                    'rel' => '',
                    'callbackType' => '',
                    'forwardUrl' => ''
                ]);
            } else {
                return response()->json([
                    'statusCode' => '300',
                    'message' => '实际可用资产不足！'
                ]);
            }
        } catch (\Exception $e) {
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
    public function execute(Request $request)
    {
        try {
            $application = Application::find($request->query("id"));
            if ($application->status) {
                $application->isExecuted = true;
                $application->checker = Auth::user()->name;
                $application->save();
                if ($application->type == "采购") {
                    $application->purchase();
                }
                return response()->json([
                    'statusCode' => '200',
                    'message' => '执行通过！',
                    'navTabId' => 'applicationView',
                    'rel' => '',
                    'callbackType' => '',
                    'forwardUrl' => ''
                ]);
            } else {
                return response()->json([
                    'statusCode' => '300',
                    'message' => '未审核通过！'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => '300',
                'message' => '操作失败！'
            ]);
        }
    }
}
