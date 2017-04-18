@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>权限组关键字：</label>
            <input type="text" name="keywords" value="{{$keyWords}}"/>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/power/add")}}" target="dialog" rel="powerAdd" width="450"
           height="800"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/power/edit")}}?id={id}" target="dialog" rel="powerEdit" width="450"
           height="800"><span>修改</span></a></li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/power/delete")}}?id={id}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a>
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
            权限组名
        </th>
        <th>
            详细权限列表
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
    @foreach ($powers as $power)
        <tr target="id" rel="{{$power->id}}">
            <td>{{$power->id}}</td>
            <td>{{$power->name}}</td>
            <td>
                <a title="查看详细" target="dialog" href="{{url("/power/info")}}?id={{$power->id}}" class="btnLook"
                   width="450" height="800"></a>
            </td>
            <td>{{$power->created_at}}</td>
            <td>{{$power->updated_at}}</td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/power/view"))