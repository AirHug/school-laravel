@extends('container.lookUp')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <td>
        课程关键字：<input type="text" name="keywords" value="{{$keyWords}}"/>
    </td>
@endsection

@section('table')
    <thead>
    <tr>
        <th>id</th>
        <th>选修课名</th>
        <th>主讲教师</th>
        <th>开课时间</th>
        <th width="80">查找带回</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($courses as $course)
        <tr>
            <td>{{$course->id}}</td>
            <td>{{$course->name}}</td>
            <td>{{$course->Teacher->name}}</td>
            <td>{{$course->created_at}}</td>
            <td>
                <a class="btnSelect" href="javascript:$.bringBack({id:'{{$course->id}}', info:'{{$course->name}}'})" title="查找带回">选择</a>
            </td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/look/course"))