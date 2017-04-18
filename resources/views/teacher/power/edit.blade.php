@extends('container.form')

@section('type')
    action="{{url("power")}}" onsubmit="return validateCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>权限组名称：</label>
        <input type="text" name="name" class="required" size="30" value="{{$power->name}}"/>
        <input type="hidden" name="id" class="required" size="30" value="{{$power->id}}"/>
    </p>
    <div class="divider"></div>
    <p>
        <label>文章新闻：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addArticle" {{$power->addArticle?"checked='checked'":""}}/>发布权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passArticle" {{$power->passArticle?"checked='checked'":""}}/>审核权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="Catalogs" {{$power->Catalogs?"checked='checked'":""}}>栏目管理权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>通知公告：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addNotice" {{$power->addNotice?"checked='checked'":""}}/>发布权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passNotice" {{$power->passNotice?"checked='checked'":""}}/>审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>广告：</label>
    </p>
    <p>
        <label><input type="checkbox" name="Advertisement" {{$power->Advertisement?"checked='checked'":""}}/>广告管理权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>友情链接：</label>
    </p>
    <p>
        <label><input type="checkbox" name="friendLink" {{$power->friendLink?"checked='checked'":""}}/>友情链接管理权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>滚动图：</label>
    </p>
    <p>
        <label><input type="checkbox" name="Banner" {{$power->Banner?"checked='checked'":""}}/>滚动图管理权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>教师请假：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addTeacherNote" {{$power->addTeacherNote?"checked='checked'":""}}/>添加权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passTeacherNote" {{$power->passTeacherNote?"checked='checked'":""}}/>审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>学生请假：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addStudentNote" {{$power->addStudentNote?"checked='checked'":""}}/>添加权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passStudentNote" {{$power->passStudentNote?"checked='checked'":""}}/>审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>教学资源：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addResource" {{$power->addResource?"checked='checked'":""}}/>上传权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passResource" {{$power->passResource?"checked='checked'":""}}/>审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>选修课：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addCourse" {{$power->addCourse?"checked='checked'":""}}/>申报权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passCourse" {{$power->passCourse?"checked='checked'":""}}/>审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>资产管理：</label>
    </p>
    <p>
        <label><input type="checkbox" name="Application" {{$power->Application?"checked='checked'":""}}/>资产申请权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="Asset" {{$power->Asset?"checked='checked'":""}}/>仓库管理审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>人员管理：</label>
    </p>
    <p>
        <label><input type="checkbox" name="Student" {{$power->Student?"checked='checked'":""}}/>学生管理</label>
    </p>
    <p>
        <label><input type="checkbox" name="Class" {{$power->Class?"checked='checked'":""}}/>专业班级管理</label>
    </p>
    <p>
        <label><input type="checkbox" name="Teacher" {{$power->Teacher?"checked='checked'":""}}/>教师管理</label>
    </p>
    <p>
        <label><input type="checkbox" name="Power" {{$power->Power?"checked='checked'":""}}/>教师权限</label>
    </p>
@endsection