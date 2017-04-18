@extends('container.form')

@section('type')
    action="{{url("power")}}" onsubmit="return validateCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>权限组名称：</label>
        <input type="text" name="name" class="required" size="30" value=""/>
        <input type="hidden" name="id" class="required" size="30" value="-1"/>
    </p>
    <div class="divider"></div>
    <p>
        <label>文章新闻：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addArticle"/>发布权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passArticle"/>审核权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="Catalogs">栏目管理权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>通知公告：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addNotice"/>发布权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passNotice"/>审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>广告：</label>
    </p>
    <p>
        <label><input type="checkbox" name="Advertisement"/>广告管理权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>友情链接：</label>
    </p>
    <p>
        <label><input type="checkbox" name="friendLink"/>友情链接管理权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>滚动图：</label>
    </p>
    <p>
        <label><input type="checkbox" name="Banner"/>滚动图管理权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>教师请假：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addTeacherNote"/>添加权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passTeacherNote"/>审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>学生请假：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addStudentNote"/>添加权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passStudentNote"/>审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>教学资源：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addResource"/>上传权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passResource"/>审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>选修课：</label>
    </p>
    <p>
        <label><input type="checkbox" name="addCourse"/>申报权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="passCourse"/>审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>资产管理：</label>
    </p>
    <p>
        <label><input type="checkbox" name="Application"/>资产申请权限</label>
    </p>
    <p>
        <label><input type="checkbox" name="Asset"/>仓库管理审核权限</label>
    </p>
    <div class="divider"></div>
    <p>
        <label>人员管理：</label>
    </p>
    <p>
        <label><input type="checkbox" name="Student"/>学生管理</label>
    </p>
    <p>
        <label><input type="checkbox" name="Class"/>专业班级管理</label>
    </p>
    <p>
        <label><input type="checkbox" name="Teacher"/>教师管理</label>
    </p>
    <p>
        <label><input type="checkbox" name="Power"/>教师权限</label>
    </p>
@endsection