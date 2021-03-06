@extends('site.master')

@section("css")
        <!-- /样式 -->
<link href="{{asset("site/css/home.min.css")}}" rel="stylesheet"/>
<link href="{{asset("site/css/data.min.css")}}" rel="stylesheet"/>
<!-- 样式/ -->
@endsection

@section("body")
    <div class="title">
        <div class="container ">
            <ul class="row">
                <li class="col-md-12 slogan">欢迎您登录东方中学
                </li>
            </ul>
        </div>
    </div>
    <div class="sky">
        <div class="container">
            <ul class="row ">
                <li class="logo col-md-6">
                    <img src="{{asset("site/Images/logo.png")}}" />
                </li>
                <li class="col-md-6 search col-lg-6">
                    <form class="input-group col-md-6">
                        <input type="text" class="form-control" value="">
                        <span class="input-group-btn">
                            <input class="btn btn-primary demo-icon icon-search" type="submit" value="&#xe808;">
                        </span>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="nav_box">
        <div class="container">
            <div class="row ">
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{url("/")}}">网站首页</a></li>
                        @foreach($catalogNavs as $nav)
                            <li>
                                <a href="{{$nav->getCatalogUrl()}}">{{$nav->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content_body">
        <div class="container">
            <div class="row">
                <div class="col-md-12 content">
                    <div class="col-md-3">
                        <div class="sidbar">
                            <h2><span class="demo-icon icon-doc-text">&#xe809;</span>通知公告</h2>
                            <div class="list-group">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="education slideTxtBox">
                            <div class="head hd">
                                <h3>详细内容</h3>
                            </div>
                            <div class="contents inside_layout bd">
                                <div class="col-md-12">
                                    <h3>{{$notice->title}}</h3>
                                    <div>
                                        {{$notice->content}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_menu">
        <div class="container">
            <div class="row">
                <ul class="col-md-12">
                    <li>
                        <a href="{{url("hx")}}">教师教务系统</a>
                        <a href="{{url("zzh")}}">学生选课系统</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section("javascript")
    <script type="application/javascript" src="{{asset("site/js/jquery.min.js")}}"></script>
    <!--[if lte IE 8]>
    <script type="application/javascript" src="{{asset("site/js/html5shiv.min.js")}}"></script>
    <script type="application/javascript" src="{{asset("site/js/respond.proxy.min.js")}}"></script>
    <script type="application/javascript" src="{{asset("site/js/respond.min.js")}}"></script>
    <![endif]-->
@endsection

@section('title',"东方中学")