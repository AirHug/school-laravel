@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="name" value="{{$name_key}}"/>
    <input type="hidden" name="class" value="{{is_null($class)?"":$class_key->id}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>学生姓名：</label>
            <input type="text" name="name" value="{{$name_key}}"/>
        </td>
        <td>
            <label>学生班级：</label>
            <input name="class.id" value="{{is_null($class)?"":$class->id}}" type="hidden"/>
            <input name="class.info" type="text" lookupGroup="class"
                   value="{{is_null($class)?"":($class->grade.$class->Major->name.$class->num."班")}}"/>
            <a class="btnLook" href="{{url("/look/class")}}" lookupGroup="class">查找带回</a>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/student/add")}}" target="dialog" rel="studentAdd" width="1280" height="800"><span>添加</span></a>
    </li>
    <li><a class="edit" href="{{url("/student/edit")}}?id={id}" target="dialog" rel="studentEdit" width="1280"
           height="800"><span>修改</span></a>
    </li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/student/delete")}}?id={id}" target="ajaxTodo"
           title="确定要删除吗?"><span>删除</span></a>
    </li>
    <li><a class="icon" href=""><span>Excel导出</span></a></li>
@endsection

@section('table')
    <thead>
    <tr>
        <th>
            学号
        </th>
        <th>
            姓名
        </th>
        <th>
            班级
        </th>
        <th>
            照片
        </th>
        <th>
            性别
        </th>
        <th>
            联系电话
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr target="id" rel="{{$student->id}}">
            <td>{{$student->number}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->studentClass->grade.$student->studentClass->Major->name.$student->studentClass->num}}班</td>
            <td>
                @if($student->photo!="")
                    <img src="{{asset("/files/student")}}/{{$student->photo}}" alt="{{$student->name}}" height="21">
                @endif
            </td>
            <td>{{$student->sex}}</td>
            <td>{{$student->mobile}}</td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/student/view"))