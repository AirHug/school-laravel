@extends('container.form')

@section('type')
    action="{{url("advertisement")}}" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>广告标题：</label>
        <input type="text" name="title" class="required" size="30" value="{{$advertisement->title}}"/>
        <input type="hidden" name="id" size="30" value="{{$advertisement->id}}"/>
    </p>
    <p>
        <label>广告链接：</label>
        <input type="text" name="link" class="required" size="30" value="{{$advertisement->link}}"/>
    </p>
    <p>
        <label>广告图片：</label>
        <input type="file" name="image" class="" size="30" value=""/>
    </p>
    <p>
        <img src="{{asset("files/advertisement/".$advertisement->image)}}" alt="" height="50">
    </p>
@endsection