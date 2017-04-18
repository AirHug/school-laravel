@extends('container.form')

@section('type')
    action="{{url("leaveNote")}}" onsubmit="return validateCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>请假教师：</label>
        <input name="teacher.id" type="hidden" value="{{$leaveNote->personId}}"/>
        <input name="teacher.info" type="text" lookupGroup="teacher"
               value="{{$leaveNote->Teacher->number."|".$leaveNote->Teacher->name}}"/>
        <a class="btnLook" href="{{url("/look/teacher")}}" lookupGroup="teacher">查找带回</a>
        <input type="hidden" name="id" value="{{$leaveNote->id}}"/>
        <input type="hidden" name="isTeacher" value="1"/>
    </p>
    <p>
        <label>请假开始时间：</label>
        <input type="text" name="start" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true" value="{{$leaveNote->start}}"/>
        <a class="inputDateButton" href="javascript:;">选择</a>
    </p>
    <p>
        <label>请假结束时间：</label>
        <input type="text" name="end" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true" value="{{$leaveNote->end}}"/>
        <a class="inputDateButton" href="javascript:;">选择</a>
    </p>
    <p>
        <label>请假理由：</label>
        <textarea name="reason" rows="3" cols="30">{{$leaveNote->reason}}</textarea>
    </p>
@endsection