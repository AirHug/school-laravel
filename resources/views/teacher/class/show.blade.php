@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="num" value="{{$num_key}}"/>
    <input type="hidden" name="grade" value="{{$grade_key}}"/>
    <input type="hidden" name="teacher" value="{{$teacher_key}}"/>
    <input type="hidden" name="major" value="{{$major_key}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>班级：</label>
            <input type="text" name="num" value="{{$num_key}}"/>
        </td>
        <td>
            <label>年级：</label>
            <input type="text" name="grade" value="{{$grade_key}}"/>
        </td>
        <td>
            <label>班主任：</label>
            <select name="teacher" class="combox">
                <option value="">选择班主任</option>
                @if(!is_null($teachers))
                    @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endforeach
                @endif
            </select>
        </td>
        <td>
            <label>专业：</label>
            <select name="major" class="combox">
                <option value="">选择专业</option>
                @if(!is_null($majors))
                    @foreach($majors as $major)
                        <option value="{{$major->id}}">{{$major->num."|".$major->name}}</option>
                    @endforeach
                @endif
            </select>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/class/add")}}" target="dialog" rel="classAdd"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/class/edit")}}?id={id}" target="dialog" rel="classEdit"><span>修改</span></a>
    </li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/class/delete")}}?id={id}" target="ajaxTodo"
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
            年级
        </th>
        <th>
            专业
        </th>
        <th>
            班级
        </th>
        <th>
            班主任
        </th>
        <th>
            备注
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($classes as $class)
        <tr target="id" rel="{{$class->id}}">
            <td>{{$class->id}}</td>
            <td>{{$class->grade}}</td>
            <td>{{$class->Major->name}}</td>
            <td>{{$class->num}}</td>
            <td>{{$class->Teacher->name}}</td>
            <td>{{$class->note}}</td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/class/view"))