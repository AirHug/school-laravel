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
    <li><a class="add" href="{{url("/banner/add")}}" target="dialog" rel="advertisementAdd"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/banner/edit")}}?id={id}" target="dialog"><span>修改</span></a></li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/banner/delete")}}?id={id}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a>
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
            图片
        </th>
        <th>
            播放顺序
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
    @foreach ($banners as $banner)
        <tr target="id" rel="{{$banner->id}}">
            <td>{{$banner->id}}</td>
            <td>{{$banner->title}}</td>
            <td>{{$banner->link}}</td>
            <td>
                <img src="{{asset("/files/banner")}}/{{$banner->image}}" alt="{{$banner->title}}" height="21">
            </td>
            <td>{{$banner->index}}</td>
            <td>{{$banner->created_at}}</td>
            <td>{{$banner->updated_at}}</td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/banner/view"))