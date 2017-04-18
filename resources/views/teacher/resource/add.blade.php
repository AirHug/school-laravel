@extends('container.form')

@section('type')
    action="{{url("resource")}}" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>资源名称：</label>
        <input type="text" name="title" class="required" size="30" value=""/>
        <input type="hidden" name="id" size="30" value="-1"/>
    </p>
    <p>
        <label>附件：</label>
        <input type="file" name="file"/>
    </p>
    <p>
        <label>附件名：</label>
        <input type="text" name="fileName"/>
    </p>
    <p>
        <label>摘要：</label>
        <textarea name="content" rows="3" cols="70"></textarea>
    </p>
@endsection