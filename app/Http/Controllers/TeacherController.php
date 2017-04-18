<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Power;
use Illuminate\Http\Request;
use App\Teacher;
use App\Http\Requests;

class TeacherController extends Controller
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

        $teachers = Teacher::where('name', 'like', "%" . $keyWord . "%")
            ->orderBy('id', 'asc')
            ->paginate($numPerPage);

        $count = Teacher::where('name', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'teachers' => $teachers,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('teacher.teacher.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        return view('teacher.teacher.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $teacher = Teacher::find($request->query("id"));
        return view('teacher.teacher.edit', compact("teacher"));
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Teacher::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'teacherView',
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
            $teacher = new Teacher();
            if ($request->input("id") != "-1") {
                $teacher = Teacher::find($request->input("id"));
            }

            if (strlen($teacher->password) == 0) $teacher->password = encrypt("1949101");
            if ($request->hasFile("photo")) {
                $teacher->photo = time(Carbon::now()) . "." . $request->file("photo")->getClientOriginalExtension();
                $request->file("photo")->move('files/teacher', $teacher->photo);
            }
            $teacher->name = $request->input("name");
            $teacher->number = $request->input("number");
            $teacher->sex = $request->input("sex");
            $teacher->group = $request->input("power_id");
            $teacher->idNumber = $request->input("idNumber");
            $teacher->workTime = $request->input("workTime");
            $teacher->school = $request->input("school");
            $teacher->note = $request->input("note");
            $teacher->email = $request->input("email");
            $teacher->mobile = $request->input("mobile");
            $teacher->degree = $request->input("degree");
            $teacher->major = $request->input("major");

            $teacher->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '操作成功！',
                'navTabId' => 'teacherView',
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
