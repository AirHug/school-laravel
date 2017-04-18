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
        <th orderfield="info">权限组名</th>
        <th width="80">查找带回</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($powers as $power)
        <tr>
            <td>{{$power->id}}</td>
            <td>{{$power->name}}</td>
            <td>
                <a class="btnSelect" href="javascript:$.bringBack({id:'{{$power->id}}', info:'{{$power->name}}'})" title="查找带回">选择</a>
            </td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/look/power"))