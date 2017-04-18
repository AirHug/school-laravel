@extends('container.lookUp')

@section('hiddenSearch')
    <input type="hidden" name="major" value="{{is_null($major_key)?"":$major_key->id}}"/>
@endsection

@section('search')
    <td>
        <label>专业：</label>
        <select name="major" class="combox">
            @if(!is_null($major_key))
                <option value="{{$major_key->id}}">{{$major_key->name}}</option>
            @endif
            <option value="">请选择专业</option>
            @foreach($majors as $major)
                <option value="{{$major->id}}">{{$major->name}}</option>
            @endforeach
        </select>
    </td>
@endsection

@section('table')
    <thead>
    <tr>
        <th orderfield="id">id</th>
        <th orderfield="info">班级信息</th>
        <th width="80">查找带回</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($classes as $class)
        <tr>
            <td>{{$class->id}}</td>
            <td>{{$class->grade.$class->Major->name.$class->num}}班</td>
            <td>
                <a class="btnSelect"
                   href="javascript:$.bringBack({id:'{{$class->id}}', info:'{{$class->grade.$class->Major->name.$class->num}}班', grade:'{{$class->grade}}', major:'{{$class->Major->name}}'})"
                   title="查找带回">选择</a>
            </td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/look/class"))