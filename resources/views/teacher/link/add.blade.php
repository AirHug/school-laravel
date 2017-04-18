@extends('container.form')

@section('type')
    action="{{url("link")}}" onsubmit="return validateCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>友情链接标题：</label>
        <input type="text" name="title" class="required" size="20" value=""/>
        <input type="hidden" name="id" size="30" value="-1"/>
    </p>
    <p>
        <label>链接：</label>
        <input type="text" name="url" class="required" size="20" value=""/>
    </p>
    <p>
        <label>排列顺序（数字）：</label>
        <input type="text" name="index" class="required digits" size="20" value=""/>
        <span class="info">越小越靠前</span>
    </p>
@endsection