@extends('container.form')

@section('type')
    action="{{url("major")}}" onsubmit="return validateCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>专业名称：</label>
        <input type="text" name="name" class="required" size="30" value="{{$major->name}}"/>
        <input type="hidden" name="id" size="30" value="{{$major->id}}"/>
    </p>
    <p>
        <label>专业编号：</label>
        <input type="text" name="num" class="required" size="30" value="{{$major->num}}"/>
    </p>
@endsection