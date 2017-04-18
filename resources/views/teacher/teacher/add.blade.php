@extends('container.form')

@section('type')
    action="{{url("teacher")}}" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>教师姓名：</label>
        <input type="text" name="name" class="required" size="30" value=""/>
        <input type="hidden" name="id" size="30" value="-1"/>
    </p>
    <p>
        <label>编号：</label>
        <input type="text" name="number" class="required" size="30"/>
    </p>
    <p>
        <label>性别：</label>
        <input type="radio" name="sex" value="男" class="required">男
        <input type="radio" name="sex" value="女" class="required">女
    </p>
    <p>
        <label>权限组：</label>
        <input name="power.id" value="" type="hidden"/>
        <input name="power.info" type="text" lookupGroup="power"/>
        <a class="btnLook" href="{{url("/look/power")}}" lookupGroup="power">查找带回</a>
    </p>
    <p>
        <label>身份证号码：</label>
        <input type="text" name="idNumber" size="30"/>
    </p>
    <p>
        <label>入职时间：</label>
        <input type="text" name="workTime" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true"/>
        <a class="inputDateButton" href="javascript:;">选择</a>
    </p>
    <p>
        <label>毕业学校：</label>
        <input type="text" name="school" size="30"/>
    </p>
    <p>
        <label>学位：</label>
        <input type="text" name="degree" size="30"/>
    </p>
    <p>
        <label>专业：</label>
        <input type="text" name="major" size="30"/>
    </p>
    <p>
        <label>邮箱：</label>
        <input type="text" name="email" size="30"/>
    </p>
    <p>
        <label>手机号码：</label>
        <input type="text" name="mobile" size="30"/>
    </p>
    <p>
        <label>照片：</label>
        <input type="file" name="photo"/>
    </p>
    <p>
        <label>备注：</label>
        <input type="text" name="note" size="30"/>
    </p>
@endsection