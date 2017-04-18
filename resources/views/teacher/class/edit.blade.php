@extends('container.form')

@section('type')
    action="{{url("class")}}" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>年级：</label>
        <input type="text" name="grade" class="required" size="20" value="{{$class->grade}}"/>
        <input type="hidden" name="id" size="20" value="{{$class->id}}"/>
        <span class="info">年份</span>
    </p>
    <p>
        <label>班级专业：</label>
        <input name="major.id" value="{{$class->major}}" type="hidden"/>
        <input name="major.info" type="text" lookupGroup="major" value="{{$class->Major->num}}|{{$class->Major->name}}"/>
        <a class="btnLook" href="{{url("/look/major")}}" lookupGroup="major">查找带回</a>
    </p>
    <p>
        <label>班号：</label>
        <input type="text" name="num" class="required digits" size="20" value="{{$class->num}}"/>
        <span class="info">数字</span>
    </p>
    <p>
        <label>班主任老师：</label>
        <input name="teacher.id" value="{{$class->teacher}}" type="hidden"/>
        <input name="teacher.info" type="text" lookupGroup="teacher" value="{{$class->Teacher->num}}|{{$class->Teacher->name}}"/>
        <a class="btnLook" href="{{url("/look/teacher")}}" lookupGroup="teacher">查找带回</a>
    </p>
    <p>
        <label>备注：</label>
        <textarea name="note" cols="30" rows="4">{{$class->note}}</textarea>
    </p>
@endsection