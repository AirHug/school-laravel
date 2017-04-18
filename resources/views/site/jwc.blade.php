@extends('site.master')

@section("css")
        <!-- /样式 -->
<link href="{{asset("site/css/index.min.css")}}" rel="stylesheet"/>
<!--[if lte IE 8]>
<link href="{{asset(" site/css/compatible.min.css")}}" rel="stylesheet" />
<![endif]-->
<!-- 样式/ -->
@endsection

@section("body")
    <div class="title">
        <div class="container ">
            <ul class="row">
                <li class="col-md-12 slogan">欢迎您登录东方中学教务处
                </li>
            </ul>
        </div>
    </div>
    <div class="sky">
        <div class="container">
            <ul class="row ">
                <li class="logo col-md-6">
                    <img src="{{asset("site/img/logo3.png")}}"/>
                </li>
                <li class="col-md-6 search col-lg-6">
                    <form class="input-group col-md-6">
                        <input type="text" class="form-control">
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
                        <li class="active"><a href="{{url("")}}">网站首页</a></li>
                        @foreach($catalogs as $catalog)
                            <li>
                                <a href="{{$catalog->getCatalogUrl()}}">{{$catalog->name}}</a>
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
                <div class="col-md-12">
                    <div class="slide white">
                        <img src="{{asset("files/banner/".$banner->image)}}"/>
                    </div>
                    <div class="content_left col-md-4">
                        <div class="col-md-12 white titles">
                            <ul>
                                <li>通知公告</li>
                                <li><a href="{{url("N")}}">更多<span>>></span></a></li>
                            </ul>
                        </div>
                        <div class="col-md-12 cls white">
                            @if(count($notices)>0)
                                <div class="col-md-4 news_pic">
                                    <img src="{{asset("site/Images/notice.ico")}}"/>
                                </div>
                                <div class="col-md-8 news_intro">
                                    {{$notices[0]->title}}
                                </div>
                                <div class="col-md-12 news_list">
                                    <ul>
                                        @for($i=1; $i<(count($notices)>6?6:count($notices));++$i)
                                            <li>
                                                <a href="{{url("N",$notices[$i]->id)}}">{{$notices[$i]->title}}</a>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            @else
                                <div class="col-md-4 news_pic">
                                    <img src="{{asset("site/Images/notice.ico")}}"/>
                                </div>
                                <div class="col-md-8">
                                    通知公告里什么都没有！
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 white titles">
                            <ul>
                                <li>用户登录</li>
                            </ul>
                        </div>
                        <div class="col-md-12 cls white">
                            <form action="{{url("hx")}}" class="login" method="post">
                                <ul class="form-inline">
                                    <li class="form-group">
                                        <label for="user_name"><span class="demo-icon icon-user">&#xe800;</span></label>
                                        <input type="user_name" class="form-control" id="username" placeholder="用户名">
                                        {{ csrf_field() }}
                                    </li>
                                </ul>
                                <ul class="form-inline">
                                    <li class="form-group">
                                        <label for="password"><span class="demo-icon icon-key">&#xe80a;</span></label>
                                        <input type="password" class="form-control" id="password" placeholder="密码">
                                    </li>
                                </ul>
                                <ul class="form-inline">
                                    <li class="form-group">
                                        <label for="text"></label>
                                        <input type="texts" style="margin-right:0px;" class="form-control" id="text"
                                               name="code" placeholder="验证码">
                                        <img src="{{captcha_src('flat')}}" width="75" height="24"
                                             onclick="this.src='/captcha/flat?' + Math.random();"/>
                                    </li>
                                </ul>
                                <input type="submit" value="登录" class="btn btn-primary">
                            </form>
                            <div class="user">
                            </div>
                        </div>
                        <div class="col-md-12 white titles">
                            <ul>
                                <li>功能导航</li>
                            </ul>
                        </div>
                        <div class="col-md-12 cls white">
                            <div class="info_btn">
                                <ul class="col-md-12">
                                    <li class="col-md-6"><a href="{{url("jng")}}" class="btn btn-primary">中小学革命史</a>
                                    </li>
                                    <li class="col-md-6"><a href="{{url("jwc")}}" class="btn btn-primary">教务处站点页</a>
                                    </li>
                                </ul>
                                <ul class="col-md-12">
                                    <li class="col-md-6"><a href="{{url("hx")}}" class="btn btn-primary">教师教务系统</a></li>
                                    <li class="col-md-6"><a href="{{url("zzh")}}" class="btn btn-primary">学生选课系统</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 content_right">
                        <div class="col-md-12 white class_content slideTxtBox">
                            <div class="hd titles">
                                <ul class="title_nav">
                                    <li class="on">校园动态|News</li>
                                </ul>
                                <div class="more">
                                    <a href="{{"L",1}}">更多<span>>></span></a>
                                </div>
                            </div>
                            <div class="bd col-md-12">
                                <ul>
                                    <li class="contents">
                                        @if(count($articles)>0)
                                            <div class="news_img col-md-6">
                                                <a href="{{url("A",$articles[0]->id)}}">
                                                    <img src="{{$articles[0]->image==""?asset("site/img/news2.jpg"):asset("files/article/".$articles[0]->image)}}"/>
                                                </a>
                                                <span>▲ {{$articles[0]->title}}</span>
                                            </div>
                                            <div class="col-md-6 news_list">
                                                @for($i=1;$i<(count($articles)>6?6:count($articles));++$i)
                                                    <ul>
                                                        <li class="col-md-6">
                                                            <a href="{{url("A",$articles[$i]->id)}}">{{$articles[$i]->title}}</a>
                                                        </li>
                                                        <li class="col-md-6 time">{{date("Y-m-d",strtotime($articles[$i]->publish_at))}}</li>
                                                    </ul>
                                                @endfor
                                            </div>
                                        @else
                                            新闻动态里什么都没有！
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 white facility slideResource">
                            <div class="col-md-12 titles">
                                <ul class="title">
                                    <li>教学资源</li>
                                </ul>
                                <div class="more">
                                    <a href="{{url("hx")}}">上传/审核</a>
                                </div>
                            </div>
                            <div class="content table-responsive col-md-12">
                                <ul>
                                    <li>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <td>资源类型</td>
                                                <td>资源描述</td>
                                                <td>下载点</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($i=0;$i<(count($resources)>5?5:count($resources));++$i)
                                                <tr>
                                                    <td>
                                                        <img src="{{asset("site/img/office/word.jpg")}}"/>
                                                    </td>
                                                    <td>{{$resources[$i]->content}}</td>
                                                    <td><a href="{{asset("files/resource/".$resources[$i]->file)}}">下载</a></td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="index_footer">
        <div class="footer">
            <p>copyright©玉环县东方中学 地址：胡东路11号 联系电话：(0576)87412873</p>
        </div>
    </div>
@endsection

@section("javascript")
    <script type="application/javascript" src="{{asset("site/js/jquery.min.js")}}"></script>
    <script type="application/javascript" src="{{asset("site/js/jquery.SuperSlide.2.1.js")}}"></script>
    <script type="application/javascript" src="{{asset("site/js/jquery.movebg.js")}}"></script>
    <script type="application/javascript" src="{{asset("site/js/index.min.js")}}"></script>
    <!--[if lte IE 8]>
    <script type="application/javascript" src="{{asset("site/js/html5shiv.min.js")}}"></script>
    <script type="application/javascript" src="{{asset("site/js/respond.proxy.min.js")}}"></script>
    <script type="application/javascript" src="{{asset("site/js/respond.min.js")}}"></script>
    <![endif]-->
@endsection

@section('title',"东方中学")