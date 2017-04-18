<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseLog;
use Illuminate\Http\Request;
use Excel;
use App\Http\Requests;

class CourseLogController extends Controller
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
        $request->merge(array('page' => $pageNum));
        $numPerPage = is_null($request->input('numPerPage')) ? 20 : $request->input('numPerPage');
        //查询条件
        $course_key = is_null($request->input('course_id')) ? null : Course::find($request->input('course_id'));

        $courseLogs = CourseLog::orderBy("id");
        if (!is_null($course_key)) $courseLogs->where("course_id", $course_key->id);
        $count = $courseLogs->count();
        $courseLogs = $courseLogs->paginate($numPerPage);

        $result = [
            'course' => $course_key,
            'courseLogs' => $courseLogs,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'totalCount' => $count
        ];

        return view('teacher.courseLog.show', $result);
    }

    /**
     * Export Excel File
     *
     * @param Request $request
     * @return response
     */
    public function excel(Request $request)
    {
        if ($request->query("id") != "") {
            $course = Course::find($request->query("id"));
            //Excel 依赖包底层代码已经被修改（重要）
            Excel::create($course->name . "_" . $course->Teacher->name . "_学生表", ["data" => $course->courseLogs], function ($excel, $param = null) {
                $excel->sheet('课程学生表', ["data"=>$param["data"]], function ($sheet, $param = null) {
                    $sheet->row(1, array(
                        '选修课程',
                        '学号',
                        "姓名",
                        "班级",
                        "性别",
                        "联系电话"
                    ));
                    $sheet->setWidth(array(
                        'A' => 20,
                        'B' => 20,
                        'C' => 10,
                        'D' => 20,
                        'E' => 10,
                        'F' => 10,
                    ));
                    $i = 2;
                    foreach ($param["data"] as $courseLog) {
                        $sheet->row($i, array(
                            $courseLog->course->name,
                            $courseLog->Student->number,
                            $courseLog->Student->name,
                            $courseLog->Student->studentClass->grade.$courseLog->Student->studentClass->Major->name.$courseLog->Student->studentClass->num."班",
                            $courseLog->Student->sex,
                            $courseLog->Student->mobile
                        ));
                        ++$i;
                    }
                });
            })->export('xls');
        } else {
            return '请先选择一门选修课！';
        }
    }
}
