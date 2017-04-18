@extends('container.lookUp')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <td>
        专业关键字：<input type="text" name="keywords" value="{{$keyWords}}"/>
    </td>
@endsection

@section('table')
    <thead>
    <tr>
        <th orderfield="id">id</th>
        <th orderfield="info">专业编号|专业名</th>
        <th width="80">查找带回</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($majors as $major)
        <tr>
            <td>{{$major->id}}</td>
            <td>{{$major->num}}|{{$major->name}}</td>
            <td>
                <a class="btnSelect" href="javascript:$.bringBack({id:'{{$major->id}}', info:'{{$major->num}}|{{$major->name}}'})" title="查找带回">选择</a>
            </td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/look/major"))