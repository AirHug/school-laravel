@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>标题关键字：</label>
            <input type="text" name="keywords" value="{{$keyWords}}"/>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/link/add")}}" target="dialog" rel="linkAdd"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/link/edit")}}?id={id}" target="dialog" rel="linkEdit"><span>修改</span></a></li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/link/delete")}}?id={id}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a>
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
            标题
        </th>
        <th>
            链接地址
        </th>
        <th>
            显示位置
        </th>
        <th>
            创建时间
        </th>
        <th>
            修改时间
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($links as $link)
        <tr target="id" rel="{{$link->id}}">
            <td>{{$link->id}}</td>
            <td>{{$link->title}}</td>
            <td>{{$link->url}}</td>
            <td>{{$link->index}}</td>
            <td>{{$link->created_at}}</td>
            <td>{{$link->updated_at}}</td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/link/view"))