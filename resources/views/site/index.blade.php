@extends('site.master')

@section("css")
        <!-- /样式 -->
<link href="{{asset("site/css/home.min.css")}}" rel="stylesheet" type="text/css"/>
<link href="{{asset("site/css/slide.css")}}" rel="stylesheet" type="text/css"/>
<link href="{{asset("site/css/ad.css")}}" type="text/css" rel="stylesheet"/>
<!-- 样式/ -->
<!--[if lte IE 8]>
<link href="{{asset(" site/css/compatible.min.css")}}" rel="stylesheet" type="text/css"/>
<![endif]-->
@endsection

@section("body")
    <?php

    /**
     * Site index
     *
     * @param Catalog $catalog
     * @return string
     */
    ?>
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
                    <img src="{{asset("site/Images/logo.png")}}" alt="logo"/>
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
                        <li><a href="http://720.hx0576.com:8080/yhdfzx.cn/newCampus/index.html">校园全景</a>
                            <ul>
                                <li style="margin-left: 8px;">
                                    <a href="http://720.hx0576.com:8080/yhdfzx.cn/newCampus/index.html">新校区3D全景</a>
                                </li>
                                <li style="margin-left: 8px;">
                                    <a href="http://720.hx0576.com:8080/yhdfzx.cn/oldCampus/index.html">老校区3D全景</a>
                                </li>
                            </ul>
                        </li>
                        @foreach($catalogs as $catalog)
                            <li><a href="{{$catalog->getCatalogUrl()}}">{{$catalog->name}}</a>
                                <ul>
                                    @foreach($catalog->subCatalog as $subCatalog)
                                        <li style="margin-left: 8px;">
                                            <a href="{{$subCatalog->getCatalogUrl()}}">{{$subCatalog->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
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
                        <div class="home_nav">
                            <div class="wraper">
                                <div class="nav wraper_body">
                                    <ul>
                                        @if(count($links)>0)
                                            @for($i=0;$i<(count($links)>5?5:count($links));++$i)
                                                <li class="nav-item {{$i==0?"cur":""}}">
                                                    <a href="{{$links[$i]->url}}"
                                                       target="_blank">{{$links[$i]->title}}</a>
                                                </li>
                                            @endfor
                                        @endif
                                    </ul>
                                    <div class="move-bg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fullSlide">
                            <div class="bd">
                                <ul>
                                    @foreach($banners as $banner)
                                        <li>
                                            <a href="{{$banner->link}}">
                                                <img src="{{asset("files/banner")}}/{{$banner->image}}"
                                                     alt="{{$banner->title}}"/></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="hd">
                                <ul></ul>
                            </div>
                            <span class="prev"></span>
                            <span class="next"></span>
                        </div>
                    </div>
                    <div class="content white">
                        <div class="col-md-4 index_content_left">
                            <h3 class="col-md-8 titles">通知公告<span>Notice</span>
                            </h3>
                            <h3 class="col-md-4 more">
                                <a href="{{url("N")}}">更多<span>>></span></a>
                            </h3>
                            <div class="col-md-12 cls">
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

                        </div>

                        <div class="col-md-8 index_content_right">
                            <ul class="head">
                                <li class="col-md-6">校园动态<span>News</span></li>
                                <li class="col-md-6 time"><a href="{{url("L",1)}}">更多<span>>></span></a>
                                </li>
                            </ul>
                            <div class="contents col-md-12">
                                @if(count($articles)>0)
                                    <div class="news_img col-md-6">
                                        <a href="{{url("A",$articles[0]->id)}}">
                                            <img src="{{$articles[0]->image==""?asset("site/img/news2.jpg"):asset("files/article/".$articles[0]->image)}}"/>
                                        </a>
                                        <span>{{$articles[0]->title}}</span>
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
                            </div>
                        </div>
                        <div class="col-md-4 col-ms-4 index_content_left cl">
                            <div class="info_btn">
                                <ul class="col-md-12">
                                    <li class="col-md-6"><a href="{{url("jng")}}" class="btn btn-primary">东方中小学革命纪念馆</a>
                                    </li>
                                    <li class="col-md-6"><a href="{{url("jwc")}}" class="btn btn-primary">教务处网站</a>
                                    </li>
                                </ul>
                                <ul class="col-md-12">
                                    <li class="col-md-6">
                                        <a href="{{url("/hx")}}" class="btn btn-primary" target="_blank">学生选课系统</a>
                                    </li>
                                    <li class="col-md-6">
                                        <a href="{{url("/hx")}}" class="btn btn-primary" target="_blank">教师教务系统</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 col-ms-8 index_content_right">
                            <div class="col-md-12 news">
                                <div class="news_slide">
                                    <div class="slideBox">
                                        <a href="javascript:void(0)" class="sPrev"></a>
                                        <ul>
                                            <li>
                                                <img src="{{asset("site/Images/msg_.jpg")}}"/>
                                            </li>
                                            <li>
                                                <img src="{{asset("site/Images/msg_.jpg")}}"/>
                                            </li>
                                            <li>
                                                <img src="{{asset("site/Images/msg_.jpg")}}"/>
                                            </li>
                                            <li>
                                                <img src="{{asset("site/Images/msg_.jpg")}}"/>
                                            </li>
                                            <li>
                                                <img src="{{asset("site/Images/msg_.jpg")}}"/>
                                            </li>
                                            <li>
                                                <img src="{{asset("site/Images/msg_.jpg")}}"/>
                                            </li>
                                            <li>
                                                <img src="{{asset("site/Images/msg_.jpg")}}"/>
                                            </li>
                                        </ul>
                                        <a href="javascript:void(0)" class="sNext"></a>
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
                        <a href="{{url("/hx")}}">教师教务系统</a>
                        <a href="{{url("/zzh")}}">学生选课系统</a>
                    </li>
                </ul>
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
    <script type="text/javascript" src="{{asset("site/js/jquery.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("site/js/jquery.SuperSlide.2.1.js")}}"></script>
    <script type="text/javascript" src="{{asset("site/js/jquery.movebg.js")}}"></script>
    <script type="text/javascript" src="{{asset("site/js/Home.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("site/js/floatingAd.js")}}"></script>
    <script type="text/javascript" src="{{asset("site/js/html5shiv.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("site/js/respond.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("site/js/respond.proxy.min.js")}}"></script>
    @if(!is_null($advertisement))
        <script type="text/javascript">
            $(function () {
                $.floatingAd({
                    //频率
                    delay: 60,
                    //超链接后是否关闭漂浮
                    isLinkClosed: true,
                    //漂浮内容
                    ad: [{
                        //关闭区域背景透明度(0.1-1)
                        headFilter: 0.3,
                        //图片
                        'img': '{{asset("files/advertisement")}}/{{$advertisement->image}}',
                        //图片高度
                        //'imgHeight': 220,
                        //图片宽度
                        'imgWidth': 150,
                        //图片链接
                        'linkUrl': '',
                        //浮动层级别
                        'z-index': 100,
                        //标题
                        'title': '{{$advertisement->title}}'
                    }],
                    //关闭事件
                    onClose: function (elem) {
                    }
                });

                $("#aa").floatingAd({
                    onClose: function (elem) {
                    }
                });

            });
        </script>
    @endif
@endsection

@section('title',"东方中学")