@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>通知公告关键字：</label>
            <input type="text" name="keywords" value="{{$keyWords}}"/>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/notice/add")}}" target="dialog" rel="advertisementAdd" width="1200"
           height="800"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/notice/edit")}}?id={id}" target="dialog" rel="advertisementEdit" width="1200"
           height="800"><span>修改</span></a>
    </li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/notice/delete")}}?id={id}" target="ajaxTodo"
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
            附件名
        </th>
        <th>
            作者
        </th>
        <th>
            审核状态
        </th>
        <th>
            审核人
        </th>
        <th>
            发布时间
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($notices as $notice)
        <tr target="id" rel="{{$notice->id}}">
            <td>{{$notice->title}}</td>
            <td>{{$notice->fileName}}</td>
            <td>{{$notice->author}}</td>
            <td>
                @if($notice->isPass)
                    ✓
                @else
                    <a class="btnSelect" href="{{url("notice/pass")}}?id={{$notice->id}}" target="ajaxTodo"
                       title="审核发布这则公告？"></a>
                @endif
            </td>
            <td>{{$notice->checker}}</td>
            <td>{{$notice->publish_at}}</td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/notice/view"))