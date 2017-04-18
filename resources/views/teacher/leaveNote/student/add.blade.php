@extends('container.form')

@section('type')
    action="{{url("leaveNote")}}" onsubmit="return validateCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>请假学生：</label>
        <input name="student.id" type="hidden"/>
        <input name="student.info" type="text" lookupGroup="student"/>
        <a class="btnLook" href="{{url("/look/student")}}" lookupGroup="student">查找带回</a>
        <input type="hidden" name="id" value="-1"/>
        <input type="hidden" name="isTeacher" value="0"/>
    </p>
    <p>
        <label>请假开始时间：</label>
        <input type="text" name="start" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true"/>
        <a class="inputDateButton" href="javascript:;">选择</a>
    </p>
    <p>
        <label>请假结束时间：</label>
        <input type="text" name="end" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true"/>
        <a class="inputDateButton" href="javascript:;">选择</a>
    </p>
    <p>
        <label>请假理由：</label>
        <textarea name="reason" rows="3" cols="30"></textarea>
    </p>
@endsection