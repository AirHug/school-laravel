<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Power;
use App\Http\Requests;

class PowerController extends Controller
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

        $powers = Power::where('name', 'like', "%" . $keyWord . "%")
            ->orderBy('id')
            ->paginate($numPerPage);

        $count = Power::where('name', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'powers' => $powers,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('teacher.power.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        return view('teacher.power.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $power = Power::find($request->query("id"));
        return view('teacher.power.edit', compact("power"));
    }

    /**
     * Show Information
     *
     * @param Request $request
     * @return response
     */
    public function info(Request $request)
    {
        $power = Power::find($request->query("id"));
        return view('teacher.power.info', compact("power"));
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Power::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'powerView',
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
        $power = new Power();
        if ($request->input("id") != "-1") $power = Power::find($request->input("id"));
        $power->name = $request->input("name");
        $power->addArticle = array_has($request->all(),"addArticle");
        $power->passArticle = array_has($request->all(),"passArticle");
        $power->addTeacherNote = array_has($request->all(),"addTeacherNote");
        $power->passTeacherNote = array_has($request->all(),"passTeacherNote");
        $power->addStudentNote = array_has($request->all(),"addStudentNote");
        $power->passStudentNote = array_has($request->all(),"passStudentNote");
        $power->addResource = array_has($request->all(),"addResource");
        $power->passResource = array_has($request->all(),"passResource");
        $power->addCourse = array_has($request->all(),"addCourse");
        $power->passCourse = array_has($request->all(),"passCourse");
        $power->addNotice = array_has($request->all(),"addNotice");
        $power->passNotice = array_has($request->all(),"passNotice");
        $power->Asset = array_has($request->all(),"Asset");
        $power->friendLink = array_has($request->all(),"friendLink");
        $power->Catalogs = array_has($request->all(),"Catalogs");
        $power->Teacher = array_has($request->all(),"Teacher");
        $power->Power = array_has($request->all(),"Power");
        $power->Student = array_has($request->all(),"Student");
        $power->Class = array_has($request->all(),"Class");
        $power->Advertisement = array_has($request->all(),"Advertisement");
        $power->Banner = array_has($request->all(),"Banner");
        $power->Application = array_has($request->all(),"Application");
        $power->save();
        return response()->json([
            'statusCode' => '200',
            'message' => '操作成功！',
            'navTabId' => 'powerView',
            'rel' => '',
            'callbackType' => 'closeCurrent',
            'forwardUrl' => ''
        ]);
    }
}
