@extends('admin.master')

@section('menu')
    <div class="accordionHeader">
        <h2><span>Folder</span>学生选课</h2>
    </div>
    <div class="accordionContent">
        <ul class="tree treeFolder">
            <li><a>学生选课</a>
                <ul>
                    <li><a href="{{url("/course/student")}}" target="navtab" rel="courseStudentView">选修课列表</a></li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('content')

@endsection

@section('user',Auth::guard('students')->user()->name)

@section('title',"东方中学站点系统--学生后台")

@section('exit',url("zzh"))