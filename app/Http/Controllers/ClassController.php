<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Major;
use App\Teacher;
use App\studentClass;
use App\Http\Requests;

class ClassController extends Controller
{

    /**
     * Show ListView
     *
     * @param Request $request
     * @return response
     */
    public function show(Request $request)
    {
        //分页参数
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $numPerPage = is_null($request->input('numPerPage')) ? 20 : $request->input('numPerPage');
        $request->merge(array('page' => $pageNum));
        //查询条件
        $num_key = is_null($request->input('num')) ? "" : $request->input('num');
        $grade_key = is_null($request->input('grade')) ? "" : $request->input('grade');
        $teacher_key = is_null($request->input('teacher')) ? "" : $request->input('teacher');
        $major_key = is_null($request->input('major')) ? "" : $request->input('major');


        $classes = studentClass::where("id", ">", 0);
        if ($num_key != "") $classes->where("num", $num_key);
        if ($grade_key != "") $classes->where("grade", $grade_key);
        if ($teacher_key != "") $classes->where("teacher", $teacher_key);
        if ($major_key != "") $classes->where("major", $major_key);
        $count = $classes->count();
        $classes = $classes->paginate($numPerPage);

        $majors = Major::all();
        $teachers = Teacher::all();

        $result = [
            'classes' => $classes,
            'majors' => $majors,
            'teachers' => $teachers,
            'num_key' => $num_key,
            'grade_key' => $grade_key,
            'teacher_key' => $teacher_key,
            'major_key' => $major_key,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'totalCount' => $count
        ];
        return view('teacher.class.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        return view('teacher.class.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $class = studentClass::find($request->query("id"));
        return view('teacher.class.edit', compact("class"));
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = studentClass::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'classView',
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
            $class = new studentClass();
            if ($request->input("id") != "-1") $class = studentClass::find($request->input("id"));
            $class->num = $request->input("num");
            $class->grade = $request->input("grade");
            $class->major = $request->input("major_id");
            $class->teacher = $request->input("teacher_id");
            $class->note = $request->input("note");
            $class->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '操作成功！',
                'navTabId' => 'classView',
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
