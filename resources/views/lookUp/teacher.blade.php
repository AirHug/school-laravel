@extends('container.lookUp')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <td>
        教师姓名：<input type="text" name="keywords" value="{{$keyWords}}"/>
    </td>
@endsection

@section('table')
    <thead>
    <tr>
        <th orderfield="id">id</th>
        <th orderfield="info">教师编号|教师姓名</th>
        <th width="80">查找带回</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($teachers as $teacher)
        <tr>
            <td>{{$teacher->id}}</td>
            <td>{{$teacher->number}}|{{$teacher->name}}</td>
            <td>
                <a class="btnSelect" href="javascript:$.bringBack({id:'{{$teacher->id}}', info:'{{$teacher->number}}|{{$teacher->name}}'})" title="查找带回">选择</a>
            </td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/look/teacher"))