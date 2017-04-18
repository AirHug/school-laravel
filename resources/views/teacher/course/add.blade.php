@extends('container.form')

@section('type')
    action="{{url("course")}}" onsubmit="return validateCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>课程名：</label>
        <input type="text" name="name" class="required" value=""/>
        <input type="hidden" name="id" size="30" value="-1"/>
    </p>
    <p>
        <label>开课老师：</label>
        <input type="text" name="teacher_name" class="required" readonly="readonly" value="{{Auth::user()->name}}"/>
        <input type="hidden" name="teacher_id" class="required" value="{{Auth::user()->id}}"/>
    </p>
    <p>
        <label>开课日期：</label>
        <select name="dayOfWeek" class="combox">
            <option value="星期一">星期一</option>
            <option value="星期二">星期二</option>
            <option value="星期三">星期三</option>
            <option value="星期四">星期四</option>
            <option value="星期五">星期五</option>
            <option value="星期六">星期六</option>
            <option value="星期日">星期日</option>
        </select>
    </p>
    <p>
        <label>开课时间：</label>
        <input type="text" name="classTime" class="required">
    </p>
    <p>
        <label>报名数：</label>
        <input type="text" name="count" class="required digits">
    </p>
    <p>
        <label>性别限制：</label>
        <select name="sex" class="combox">
            <option value="">不限</option>
            <option value="男">男</option>
            <option value="女">女</option>
        </select>
    </p>
    <p>
        <label>班级限制：</label>
        <input name="class.id" type="hidden" class="required" value="0"/>
        <input name="class.info" type="text" lookupGroup="class"/>
        <a class="btnLook" href="{{url("/look/class")}}" lookupGroup="class">查找带回</a>
    </p>
    <p>
        <label>专业限制：</label>
        <input name="major.id" value="" type="hidden" value="0"/>
        <input name="major.info" type="text" lookupGroup="major"/>
        <a class="btnLook" href="{{url("/look/major")}}" lookupGroup="major">查找带回</a>
    </p>
@endsection