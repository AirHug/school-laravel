@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>资源关键字：</label>
            <input type="text" name="keywords" value="{{$keyWords}}"/>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/resource/add")}}" target="dialog" rel="resourceAdd"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/resource/edit")}}?id={id}" target="dialog" rel="resourceEdit"><span>修改</span></a>
    </li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/resource/delete")}}?id={id}" target="ajaxTodo"
           title="确定要删除吗?"><span>删除</span></a>
    </li>
    <li><a class="icon" href=""><span>Excel导出</span></a></li>
@endsection

@section('table')
    <thead>
    <tr>
        <th>
            标题
        </th>
        <th>
            摘要
        </th>
        <th>
            文件名
        </th>
        <th>
            审核人
        </th>
        <th>
            审核状态
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($resources as $resource)
        <tr target="id" rel="{{$resource->id}}">
            <td>{{$resource->title}}</td>
            <td>{{$resource->content}}</td>
            <td>{{$resource->fileName}}</td>
            <td>{{$resource->checker}}</td>
            <td>
                @if($resource->isPass)
                    ✓
                @else
                    <a class="btnSelect" href="{{url("resource/pass")}}?id={{$resource->id}}" target="ajaxTodo"
                       title="审核发布该教学资源？"></a>
                @endif
            </td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/resource/view"))