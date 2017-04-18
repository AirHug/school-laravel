@extends('container.form')

@section('type')
    action="{{url("advertisement")}}" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>广告标题：</label>
        <input type="text" name="title" class="required" size="30" value=""/>
        <input type="hidden" name="id" size="30" value="-1"/>
    </p>
    <p>
        <label>广告链接：</label>
        <input type="text" name="link" class="required" size="30" value=""/>
    </p>
    <p>
        <label>广告图片：</label>
        <input type="file" name="image" class="required"/>
    </p>
@endsection