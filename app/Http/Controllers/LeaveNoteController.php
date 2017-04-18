<?php

namespace App\Http\Controllers;

use App\LeaveNote;
use App\Teacher;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class LeaveNoteController extends Controller
{

    /**
     * Show ListView
     *
     * @param Request $request
     * @return response
     */
    public function teacher(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $request->merge(array('page' => $pageNum));
        $numPerPage = is_null($request->input('numPerPage')) ? 20 : $request->input('numPerPage');

        $teacher_key = is_null($request->input('teacher_id')) ? null : Teacher::find($request->input('teacher_id'));

        $leaveNotes = LeaveNote::where("isTeacher", true)
            ->orderBy('id', 'asc');
        if (!is_null($teacher_key)) $leaveNotes->where('personId', $teacher_key->id);
        $count = $leaveNotes->count();
        $leaveNotes = $leaveNotes->paginate($numPerPage);

        $result = [
            'leaveNotes' => $leaveNotes,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'teacher' => $teacher_key,
            'totalCount' => $count
        ];

        return view('teacher.leaveNote.teacher.show', $result);
    }

    /**
     * Show ListView
     *
     * @param Request $request
     * @return response
     */
    public function student(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $request->merge(array('page' => $pageNum));
        $numPerPage = is_null($request->input('numPerPage')) ? 20 : $request->input('numPerPage');

        $student_key = is_null($request->input('student_id')) ? null : Student::find($request->input('student_id'));

        $leaveNotes = LeaveNote::where("isTeacher", false)
            ->orderBy('id', 'asc');
        if (!is_null($student_key)) $leaveNotes->where('personId', $student_key->id);
        $count = $leaveNotes->count();
        $leaveNotes = $leaveNotes->paginate($numPerPage);

        $result = [
            'leaveNotes' => $leaveNotes,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'student' => $student_key,
            'totalCount' => $count
        ];
        return view('teacher.leaveNote.student.show', $result);
    }

    /**
     * Add DataView
     *
     * @param string $type
     * @return response
     */
    public function add($type)
    {
        if ($type == "teacher") {
            return view('teacher.leaveNote.teacher.add', compact("type"));
        } elseif ($type == "student") {
            return view('teacher.leaveNote.student.add', compact("type"));
        }
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @param string $type
     * @return response
     */
    public function edit(Request $request, $type)
    {
        $leaveNote = LeaveNote::find($request->query("id"));
        if ($type == "teacher") {
            return view('teacher.leaveNote.teacher.edit', compact("leaveNote"));
        } elseif ($type == "student") {
            return view('teacher.leaveNote.student.edit', compact("leaveNote"));
        }
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = LeaveNote::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'leaveView',
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
            $leaveNote = new LeaveNote();
            if ($request->input("id") != "-1") $leaveNote = LeaveNote::find($request->input("id"));
            $leaveNote->start = $request->input("start");
            $leaveNote->end = $request->input("end");
            $leaveNote->isTeacher = $request->input("isTeacher") == "1" ? true : false;
            $leaveNote->personId = $leaveNote->isTeacher ? $request->input("teacher_id") : $request->input("student_id");
            $leaveNote->reason = $request->input("reason");
            $leaveNote->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '操作成功！',
                'navTabId' => 'leaveView',
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
            $leaveNote = LeaveNote::find($request->query("id"));
            $leaveNote->isPass = true;
            $leaveNote->checker = Auth::user()->name;
            $leaveNote->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '审核通过！',
                'navTabId' => 'leaveView',
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
}
