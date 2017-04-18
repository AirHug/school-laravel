@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="teacher.id" value="{{is_null($teacher)?"":$teacher->id}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>创建者：</label>
            <input name="teacher.id" value="{{is_null($teacher)?"":$teacher->id}}" type="hidden"/>
            <input name="teacher.info" type="text" lookupGroup="teacher"
                   value="{{is_null($teacher)?"":($teacher->number."|".$teacher->name)}}"/>
            <a class="btnLook" href="{{url("/look/teacher")}}" lookupGroup="teacher">查找带回</a>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/application/add")}}" target="dialog" rel="applicationAdd"><span>添加</span></a></li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/application/delete")}}?id={id}" target="ajaxTodo"
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
            申请人
        </th>
        <th>
            申请种类
        </th>
        <th>
            详细项目
        </th>
        <th>
            审核状态
        </th>
        <th>
            审核人
        </th>
        <th>
            执行状态
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($applications as $application)
        <tr target="id" rel="{{$application->id}}">
            <td>{{$application->id}}</td>
            <td>{{$application->Creator->number}}|{{$application->Creator->name}}</td>
            <td>{{$application->type}}</td>
            <td>
                <a title="查看详细" target="dialog" href="{{url("/application/info")}}?id={{$application->id}}" rel="applicationInfo" class="btnLook"></a>
            </td>
            <td>
                @if($application->status)
                    ✓
                @else
                    <a class="btnSelect" href="{{url("application/pass")}}?id={{$application->id}}" target="ajaxTodo"
                       title="审核通过这条请求？"></a>
                @endif
            </td>
            <td>{{$application->checker}}</td>
            <td>
                @if($application->isExecuted)
                    ✓
                @else
                    <a class="btnSelect" href="{{url("application/execute")}}?id={{$application->id}}"
                       target="ajaxTodo"
                       title="执行这条请求？"></a>
                @endif
            </td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/application/view"))