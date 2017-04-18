@extends('container.form')

@section('type')
    action="{{url("catalog")}}" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>栏目名：</label>
        <input type="text" name="name" class="required" size="30" value=""/>
        <input type="hidden" name="id" size="30" value="-1"/>
    </p>
    <p>
        <label>父栏目：</label>
        <select name="pid" class="combox required AHcombox">
            <option value="0">作为一级栏目</option>
            @foreach($topCatalogs as $topCatalog)
                <option value="{{$topCatalog->id}}">{{$topCatalog->name}}</option>
            @endforeach
        </select>
        <span class="info">一级栏目才能在首页显示</span>
    </p>
    <p class="AHisShow">
        <label>是否在导航显示：</label>
        <input type="radio" name="isShow" value="1">是
        <input type="radio" name="isShow" value="0">否
    </p>
    <p>
        <label>栏目类型：</label>
        <input class="channelType" type="radio" name="channelType" value="0">一般栏目
        <input class="channelType" type="radio" name="channelType" value="1">文档栏目
        <input class="channelType" type="radio" name="channelType" value="2">链接栏目
    </p>
    <p id="link" style="display: none">
        <label>链接路径：</label>
        <input type="text" name="url" size="30" value=""/>
    </p>
    <p id="article" style="display: none">
        <label>文档选择：</label>
        <input name="article.id" value="" type="hidden"/>
        <input name="article.title" type="text" class="readonly" lookupGroup="article"/>
        <a class="btnLook" href="{{url("/look/article")}}" lookupGroup="article">查找带回</a>
    </p>
    <p>
        <label>栏目图片：</label>
        <input type="file" name="image" size="30" value=""/>
    </p>
    <p>
        <label>栏目简介：</label>
        <span class="info">(简介内容请控制在128字符以内)</span>
    </p>
    <p>
        <textarea name="abstract" cols="60" rows="5"></textarea>
    </p>
@endsection

@section('script')
    <script type="application/javascript">
        $(".channelType").change(function () {
            if ($('input:radio[name="channelType"]:checked').val() == "0") {
                $("#link").css("display", "none");
                $("#article").css("display", "none");
            } else if ($('input:radio[name="channelType"]:checked').val() == "1") {
                $("#link").css("display", "none");
                $("#article").css("display", "block");
            } else {
                $("#article").css("display", "none");
                $("#link").css("display", "block");
            }
        });
        $(".AHcombox").change(function () {
            if ($(this).children('option:selected').val() != 0) {
                $(".AHisShow").css("display", "none");
            }else{
                $(".AHisShow").css("display", "block");
            }
        })
    </script>
@endsection