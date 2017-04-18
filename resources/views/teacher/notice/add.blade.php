@extends('container.form')

@section('type')
    action="{{url("notice")}}" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>通知公告标题：</label>
        <input type="text" name="title" class="required" size="30" value=""/>
        <input type="hidden" name="id" size="30" value="-1"/>
    </p>
    <p>
        <label>创建者：</label>
        <input type="text" name="author" class="required" readonly="readonly" size="30" value="{{Auth::user()->name}}"/>
    </p>
    <p>
        <label>发布时间：</label>
        <input type="text" name="publish_at" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true"/>
        <a class="inputDateButton" href="javascript:;">选择</a>
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
    </p>
    <p>
        <label>通知公告内容：</label>
    </p>
    <p>
    </p>
    <p>
    </p>
    <p>
        <textarea class="editor" name="content" rows="35" cols="160" upLinkUrl="{{url("upload")}}" upLinkExt="zip,rar,txt" upImgUrl="{{url("upload")}}" upImgExt="jpg,jpeg,gif,png" upFlashUrl="{{url("upload")}}" upFlashExt="swf" upMediaUrl="{{url("upload")}}" upMediaExt="avi">
        </textarea>
    </p>
@endsection