@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>专业关键字：</label>
            <input type="text" name="keywords" value="{{$keyWords}}"/>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/major/add")}}" target="dialog" rel="majorAdd"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/major/edit")}}?id={id}" target="dialog" rel="majorEdit"><span>修改</span></a>
    </li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/major/delete")}}?id={id}" target="ajaxTodo"
           title="确定要删除吗?"><span>删除</span></a>
    </li>
    <li><a class="icon" href=""><span>Excel导出</span></a></li>
@endsection

@section('table')
    <thead>
    <tr>
        <th>
            id
        </th>
        <th>
            专业编号
        </th>
        <th>
            专业名称
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($majors as $major)
        <tr target="id" rel="{{$major->id}}">
            <td>{{$major->id}}</td>
            <td>{{$major->name}}</td>
            <td>{{$major->num}}</td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/major/view"))