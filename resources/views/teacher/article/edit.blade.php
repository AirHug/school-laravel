@extends('container.form')

@section('type')
    action="{{url("article")}}" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>文章标题：</label>
        <input type="text" name="title" class="required" size="30" value="{{$article->title}}"/>
        <input type="hidden" name="id" size="30" value="{{$article->id}}"/>
    </p>
    <p>
        <label>创建者：</label>
        <input type="text" name="author" class="required" readonly="readonly" size="30" value="{{$article->author}}"/>
    </p>
    <p>
        <label>编辑者：</label>
        <input type="text" name="editor" class="required" readonly="readonly" size="30" value="{{Auth::user()->name}}"/>
    </p>
    <p>
        <label>所属栏目：</label>
        <select name="catalog" class="required">
            <option value="{{$article->catalog}}">{{$article->catalog=="-1"?"作为独立文档存在":$article->Catalog->name}}</option>
            <option value="-1">作为独立文档存在</option>
            @foreach($catalogs as $catalog)
                <option value="{{$catalog->id}}">{{$catalog->name}}</option>
            @endforeach
        </select>
    </p>
    <p>
        <label>文章来源：</label>
        <input type="text" name="resource" value="{{$article->resource}}"/>
    </p>
    <p>
        <label>关键词：</label>
        <input type="text" name="keyword" value="{{$article->keyword}}"/>
    </p>
    <p>
        <label>附件：</label>
        <input type="file" name="file"/>
    </p>
    <p>
        <label>附件名：</label>
        <input type="text" name="fileName" value="{{$article->fileName}}"/>
    </p>
    <p>
        <label>文章图片：</label>
        <input type="file" name="image"/>
    </p>
    <p>
        <label>发布时间：</label>
        <input type="text" name="publish_at" class="date" dateFmt="yyyy-MM-dd HH:mm:ss" readonly="true" value="{{$article->publish_at}}"/>
        <a class="inputDateButton" href="javascript:;">选择</a>
    </p>
    <p>
        <label>是否推荐：</label>
        <input type="radio" name="isCommand" value="1" {{$article->isCommand?"checked='checked'":""}}>是
        <input type="radio" name="isCommand" value="0" {{!$article->isCommand?"checked='checked'":""}}>否
    </p>
    <p>
        <label>是否置顶：</label>
        <input type="radio" name="isTop" value="1" {{$article->isTop?"checked='checked'":""}}>是
        <input type="radio" name="isTop" value="0" {{!$article->isTop?"checked='checked'":""}}>否
    </p>
    <p>
        <label>特殊文章：</label>
        <input type="radio" name="isSpecial" value="1" {{$article->isSpecial?"checked='checked'":""}}>是
        <input type="radio" name="isSpecial" value="0" {{!$article->isSpecial?"checked='checked'":""}}>否
    </p>
    <p>
        <label>文章内容：</label>
    </p>
    <p>
    </p>
    <p>
        <textarea class="editor" name="content" rows="35" cols="160" upLinkUrl="{{url("upload")}}" upLinkExt="zip,rar,txt" upImgUrl="{{url("upload")}}" upImgExt="jpg,jpeg,gif,png" upFlashUrl="{{url("upload")}}" upFlashExt="swf" upMediaUrl="{{url("upload")}}" upMediaExt="avi">{{$article->content}}</textarea>
    </p>
@endsection