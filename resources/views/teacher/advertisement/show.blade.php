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
    <li><a class="add" href="{{url("/advertisement/add")}}" target="dialog" rel="advertisementAdd"><span>添加</span></a>
    </li>
    <li><a class="edit" href="{{url("/advertisement/edit")}}?id={id}" target="dialog"><span>修改</span></a></li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/advertisement/delete")}}?id={id}" target="ajaxTodo"
           title="确定要删除吗?"><span>删除</span></a></li>
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
            图片
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
    @foreach ($ads as $ad)
        <tr target="id" rel="{{$ad->id}}">
            <td>{{$ad->id}}</td>
            <td>{{$ad->title}}</td>
            <td>{{$ad->link}}</td>
            <td>
                <img src="{{asset("/files/advertisement")}}/{{$ad->image}}" alt="{{$ad->title}}" height="21">
            </td>
            <td>{{$ad->created_at}}</td>
            <td>{{$ad->updated_at}}</td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/advertisement/view"))