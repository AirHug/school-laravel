@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>教师姓名：</label>
            <input type="text" name="keywords" value="{{$keyWords}}"/>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/teacher/add")}}" target="dialog" rel="teacherAdd" width="800"
           height="350"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/teacher/edit")}}?id={id}" target="dialog" rel="teacherEdit" width="800"
           height="350"><span>修改</span></a>
    </li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/teacher/delete")}}?id={id}" target="ajaxTodo"
           title="确定要删除吗?"><span>删除</span></a>
    </li>
    <li><a class="icon" href=""><span>Excel导出</span></a></li>
@endsection

@section('table')
    <thead>
    <tr>
        <th>
            编号
        </th>
        <th>
            姓名
        </th>
        <th>
            照片
        </th>
        <th>
            性别
        </th>
        <th>
            学位
        </th>
        <th>
            专业
        </th>
        <th>
            权限组
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($teachers as $teacher)
        <tr target="id" rel="{{$teacher->id}}">
            <td>{{$teacher->number}}</td>
            <td>{{$teacher->name}}</td>
            <td>
                @if($teacher->photo!="")
                    <a href="{{url("/files/teacher")}}/{{$teacher->photo}}" target="_blank">
                        <img src="{{asset("/files/teacher")}}/{{$teacher->photo}}" alt="{{$teacher->name}}" height="21">
                    </a>
                @endif
            </td>
            <td>{{$teacher->sex}}</td>
            <td>{{$teacher->degree}}</td>
            <td>{{$teacher->major}}</td>
            <td>{{$teacher->Power->name}}</td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/teacher/view"))