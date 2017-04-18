@extends('container.lookUp')

@section('hiddenSearch')
    <input type="hidden" name="name" value="{{$name_key}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>学生姓名：</label>
            <input type="text" name="name" value="{{$name_key}}"/>
        </td>
    </tr>
@endsection

@section('table')
    <thead>
    <tr>
        <th>id</th>
        <th>学号|姓名</th>
        <th width="80">查找带回</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->number}}|{{$student->name}}</td>
            <td>
                <a class="btnSelect" href="javascript:$.bringBack({id:'{{$student->id}}', info:'{{$student->number}}|{{$student->name}}'})" title="查找带回">选择</a>
            </td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/look/student"))