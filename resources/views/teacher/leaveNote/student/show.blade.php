@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="teacher_id" value="{{is_null($student)?"":$student->id}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>请假学生：</label>
            <input name="student.id" value="{{is_null($student)?"":$student->id}}" type="hidden"/>
            <input name="student.info" type="text" lookupGroup="student" value="{{is_null($student)?"":$student->number."|".$student->name}}"/>
            <a class="btnLook" href="{{url("/look/student")}}" lookupGroup="student">查找带回</a>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/leaveNote/add/student")}}" target="dialog" rel="leaveNoteAdd"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/leaveNote/edit/student")}}?id={id}" target="dialog" rel="leaveNoteEdit"><span>修改</span></a>
    </li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/leaveNote/delete")}}?id={id}" target="ajaxTodo"
           title="确定要删除吗?"><span>删除</span></a>
    </li>
    <li><a class="icon" href=""><span>Excel导出</span></a></li>
@endsection

@section('table')
    <thead>
    <tr>
        <th>
            请假人
        </th>
        <th>
            请假理由
        </th>
        <th>
            请假开始时间
        </th>
        <th>
            请假结束时间
        </th>
        <th>
            审核状态
        </th>
        <th>
            审核人
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($leaveNotes as $leaveNote)
        <tr target="id" rel="{{$leaveNote->id}}">
            <td>{{$leaveNote->Student->number."|".$leaveNote->Student->name}}</td>
            <td>{{$leaveNote->reason}}</td>
            <td>{{$leaveNote->start}}</td>
            <td>{{$leaveNote->end}}</td>
            <td>
                @if($leaveNote->isPass)
                    ✓
                @else
                    <a class="btnSelect" href="{{url("leaveNote/pass")}}?id={{$leaveNote->id}}" target="ajaxTodo"
                       title="批准请假请求？"></a>
                @endif
            </td>
            <td>{{$leaveNote->checker}}</td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/leaveNote/student"))