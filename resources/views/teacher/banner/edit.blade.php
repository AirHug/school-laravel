@extends('container.form')

@section('type')
    action="{{url("banner")}}" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>滚动图标题：</label>
        <input type="text" name="title" class="required" size="30" value="{{$banner->title}}"/>
        <input type="hidden" name="id" size="30" value="{{$banner->id}}"/>
    </p>
    <p>
        <label>滚动图链接：</label>
        <input type="text" name="link" class="required" size="30" value="{{$banner->link}}"/>
    </p>
    <p>
        <label>播放顺序：</label>
        <input type="text" name="index" class="required digits" size="30" value="{{$banner->index}}"/>
    </p>
    <p>
        <label>滚动图图片：</label>
        <input type="file" name="image" class="required" size="30" value=""/>
    </p>
@endsection