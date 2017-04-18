<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseLog;
use App\Major;
use App\studentClass;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class CourseController extends Controller
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
        $name_key = is_null($request->input('name')) ? "" : $request->input('name');
        $teacher_key = is_null($request->input('teacher_id')) ? null : Teacher::find($request->input('teacher'));
        $day_key = is_null($request->input('day')) ? "" : $request->input('day');
        $sex_key = is_null($request->input('sex')) ? "" : $request->input('sex');
        $class_key = is_null($request->input('class_id')) ? null : studentClass::find($request->input('class_id'));
        $major_key = is_null($request->input('major_id')) ? null : Major::find($request->input('major_id'));

        $courses = Course::where('name', 'like', "%" . $name_key . "%");
        if (!is_null($teacher_key)) $courses->where("teacher_id", $teacher_key->id);
        if ($day_key != "") $courses->where("dayOfWeek", $day_key);
        if ($sex_key != "") $courses->where("sex", $sex_key);
        if (!is_null($class_key)) $courses->where("class", $class_key->id);
        if (!is_null($major_key)) $courses->where("major", $major_key->id);
        $count = $courses->count();
        $courses = $courses->paginate($numPerPage);

        $result = [
            'teacher' => $teacher_key,
            'name' => $name_key,
            'day' => $day_key,
            'sex' => $sex_key,
            'class' => $class_key,
            'major' => $major_key,
            'courses' => $courses,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'totalCount' => $count
        ];

        return view('teacher.course.show', $result);
    }

    /**
     * Show ListView
     *
     * @param Request $request
     * @return response
     */
    public function student(Request $request)
    {
        //分页参数
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $request->merge(array('page' => $pageNum));
        $numPerPage = is_null($request->input('numPerPage')) ? 20 : $request->input('numPerPage');
        //查询条件
        $name_key = is_null($request->input('name')) ? "" : $request->input('name');
        $teacher_key = is_null($request->input('teacher_id')) ? null : Teacher::find($request->input('teacher'));
        $day_key = is_null($request->input('day')) ? "" : $request->input('day');
        $sex_key = is_null($request->input('sex')) ? "" : $request->input('sex');
        $class_key = is_null($request->input('class_id')) ? null : studentClass::find($request->input('class_id'));
        $major_key = is_null($request->input('major_id')) ? null : Major::find($request->input('major_id'));

        $courses = Course::where('name', 'like', "%" . $name_key . "%")->where("isClose", false);
        if (!is_null($teacher_key)) $courses->where("teacher_id", $teacher_key->id);
        if ($day_key != "") $courses->where("dayOfWeek", $day_key);
        if ($sex_key != "") $courses->where("sex", $sex_key);
        if (!is_null($class_key)) $courses->where("class", $class_key->id);
        if (!is_null($major_key)) $courses->where("major", $major_key->id);
        $count = $courses->count();
        $courses = $courses->paginate($numPerPage);

        $result = [
            'teacher' => $teacher_key,
            'name' => $name_key,
            'day' => $day_key,
            'sex' => $sex_key,
            'class' => $class_key,
            'major' => $major_key,
            'courses' => $courses,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'totalCount' => $count,
            'studentCourses' => Auth::guard("students")->user()->Courses
        ];
        return view('student.course.student', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        return view('teacher.course.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $course = Course::find($request->query("id"));
        return view('teacher.course.edit', compact("course"));
    }

    /**
     * Delete Data
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Course::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'courseView',
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
            $course = new Course();
            if ($request->input("id") != "-1") $course = Course::find($request->input("id"));
            $course->name = $request->input("name");
            $course->teacher_id = $request->input("teacher_id");
            $course->dayOfWeek = $request->input("dayOfWeek");
            $course->classTime = $request->input("classTime");
            $course->count = $request->input("count");
            $course->sex = $request->input("sex");
            $course->class = $request->input("class_id");
            $course->major = $request->input("major_id");
            $course->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '添加成功！',
                'navTabId' => 'courseView',
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

    /**
     * Pass
     *
     * @param Request $request
     * @return response
     */
    public function pass(Request $request)
    {
        try {
            $course = Course::find($request->query("id"));
            $course->isPass = true;
            $course->checker = Auth::user()->name;
            $course->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '审核通过！',
                'navTabId' => 'courseView',
                'rel' => '',
                'callbackType' => '',
                'forwardUrl' => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => '300',
                'message' => '操作失败！'
            ]);
        }
    }

    /**
     * Operate
     *
     * @param Request $request
     * @return response
     */
    public function operate(Request $request)
    {
        try {
            $course = Course::find($request->query("id"));
            $course->isClose = !$course->isClose;
            $course->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '操作成功！',
                'navTabId' => 'courseView',
                'rel' => '',
                'callbackType' => '',
                'forwardUrl' => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => '300',
                'message' => '操作失败！'
            ]);
        }
    }

    /**
     * Select Course
     *
     * @param Request $request
     * @return response
     */
    public function select(Request $request)
    {
        try {
            $course = Course::find($request->query("id"));
            if ($course->count == $course->selected) {
                return response()->json([
                    'statusCode' => '300',
                    'message' => '该课程余量为0！'
                ]);
            } elseif (!($course->sex == "" || $course->sex == Auth::guard("students")->user()->sex)) {
                return response()->json([
                    'statusCode' => '300',
                    'message' => '该课程有性别限制！'
                ]);
            } elseif (!($course->class == 0 || $course->class == Auth::guard("students")->user()->class)) {
                return response()->json([
                    'statusCode' => '300',
                    'message' => '该课程有班级限制！'
                ]);
            } elseif (!($course->major == 0 || $course->major == Auth::guard("students")->user()->studentClass->major)) {
                return response()->json([
                    'statusCode' => '300',
                    'message' => '该课程有专业限制！'
                ]);
            } else {
                $courseLog = CourseLog::where("year", Carbon::now()->year)
                    ->where("semester", Carbon::now()->month < 7 ? 0 : 1)
                    ->first();
                if (is_null($courseLog)) {//新建
                    $courseLog = new CourseLog();
                    $courseLog->student_id = Auth::guard("students")->user()->id;
                    $courseLog->year = Carbon::now()->year;
                    $courseLog->semester = Carbon::now()->month < 7 ? 0 : 1;
                    $courseLog->score = 0;
                } else {//回滚旧选课
                    $oldCourse = Course::find($courseLog->course_id);
                    $oldCourse->selected = $oldCourse->selected - 1;
                    $oldCourse->save();
                }
                $courseLog->course_id = $request->query("id");
                $course->selected = $course->selected + 1;
                $course->save();
                $courseLog->save();
                return response()->json([
                    'statusCode' => '200',
                    'message' => '选课成功！',
                    'navTabId' => 'courseStudentView',
                    'rel' => '',
                    'callbackType' => '',
                    'forwardUrl' => ''
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
