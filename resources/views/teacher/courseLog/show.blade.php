@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="course_id" value="{{is_null($course)?"":$course->id}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>选修课：</label>
            <input name="course.id" value="{{is_null($course)?"":$course->id}}" type="hidden"/>
            <input name="course.info" type="text" lookupGroup="major" value="{{is_null($course)?"":$course->name}}"/>
            <a class="btnLook" href="{{url("/look/course")}}" lookupGroup="course">查找带回</a>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="icon" href="{{url("/courseLog/excel")}}?id={{is_null($course)?"":$course->id}}" target="_blank"><span>Excel导出学生信息</span></a></li>
@endsection

@section('table')
    <thead>
    <tr>
        <th>
            选修课
        </th>
        <th>
            学号
        </th>
        <th>
            姓名
        </th>
        <th>
            班级
        </th>
        <th>
            性别
        </th>
        <th>
            联系电话
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($courseLogs as $courseLog)
        <tr>
            <td>{{is_null($course)?"请选择选修课":$course->name}}</td>
            <td>{{$courseLog->number}}</td>
            <td>{{$courseLog->Student->name}}</td>
            <td>{{$courseLog->Student->class}}</td>
            <td>{{$courseLog->Student->sex}}</td>
            <td>{{$courseLog->Student->mobile}}</td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/courseLog/view"))