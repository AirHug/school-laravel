@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>关键字：</label>
            <input type="text" name="keywords" value="{{$keyWords}}"/>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/asset/add")}}" target="dialog" rel="advertisementAdd"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/asset/edit")}}?id={id}" target="dialog"><span>修改</span></a></li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/asset/delete")}}?id={id}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a>
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
            资产名
        </th>
        <th>
            资产总量
        </th>
        <th>
            可用数量
        </th>
        <th>
            备注
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($assets as $asset)
        <tr target="id" rel="{{$asset->id}}">
            <td>{{$asset->id}}</td>
            <td>{{$asset->name}}</td>
            <td>{{$asset->count}}</td>
            <td>{{$asset->count-(int)$asset->getAvailableCount()[0]->count}}</td>
            <td>{{$asset->note}}</td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/asset/view"))