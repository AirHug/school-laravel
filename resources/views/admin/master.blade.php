<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>

    <link href="{{asset('themes/default/style.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{asset('themes/css/core.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{asset('themes/css/print.css')}}" rel="stylesheet" type="text/css" media="print"/>
    <link href="{{asset('uploadify/css/uploadify.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <!--[if IE]>
    <link href="{{asset('themes/css/ieHack.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <![endif]-->

    <!--[if lt IE 9]><script src="{{asset('js/speedup.js')}}" type="text/javascript"></script><script src="{{asset('js/jquery-1.11.3.min.js')}}" type="text/javascript"></script><![endif]-->
    <!--[if gte IE 9]><!--><script src="{{asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script><!--<![endif]-->

    <script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.validate.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.bgiframe.js')}}" type="text/javascript"></script>
    <script src="{{asset('xheditor/xheditor-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('xheditor/xheditor_lang/zh-cn.js')}}" type="text/javascript"></script>
    <script src="{{asset('uploadify/scripts/jquery.uploadify.js')}}" type="text/javascript"></script>

    <!-- svg图表  supports Firefox 3.0+, Safari 3.0+, Chrome 5.0+, Opera 9.5+ and Internet Explorer 6.0+ -->
    <script type="text/javascript" src="{{asset('chart/raphael.js')}}"></script>
    <script type="text/javascript" src="{{asset('chart/g.raphael.js')}}"></script>
    <script type="text/javascript" src="{{asset('chart/g.bar.js')}}"></script>
    <script type="text/javascript" src="{{asset('chart/g.line.js')}}"></script>
    <script type="text/javascript" src="{{asset('chart/g.pie.js')}}"></script>
    <script type="text/javascript" src="{{asset('chart/g.dot.js')}}"></script>

    <script src="{{asset('js/dwz.core.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.util.date.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.validate.method.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.barDrag.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.drag.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.tree.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.accordion.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.ui.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.theme.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.switchEnv.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.alertMsg.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.contextmenu.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.navTab.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.tab.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.resize.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.dialog.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.dialogDrag.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.sortDrag.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.cssTable.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.stable.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.taskBar.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.ajax.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.pagination.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.database.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.datepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.effects.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.panel.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.checkbox.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.history.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.combox.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dwz.print.js')}}" type="text/javascript"></script>

    <!-- 可以用dwz.min.js替换前面全部dwz.*.js (注意：替换时下面dwz.regional.zh.js还需要引入)
    <script src="bin/dwz.min.js" type="text/javascript"></script>
    -->
    <script src="js/dwz.regional.zh.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(function(){
            DWZ.init("dwz.frag.xml", {
		        loginUrl:"/HX",	// 跳到登录页面
                statusCode:{ok:200, error:300, timeout:301}, //【可选】
                pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
                keys: {statusCode:"statusCode", message:"message"}, //【可选】
                ui:{hideMode:'offsets'}, //【可选】hideMode:navTab组件切换的隐藏方式，支持的值有’display’，’offsets’负数偏移位置的值，默认值为’display’
                debug:false,	// 调试模式 【true|false】
                callback:function(){
                    initEnv();
                    $("#themeList").theme({themeBase:"themes"}); // themeBase 相对于index页面的主题base路径
                }
            });
        });

    </script>
</head>

<body>
<div id="layout">
    <div id="header">
        <div class="headerNav">
            <img style="height: inherit;" src="{{asset('themes/default/images/logo.png')}}" />
            <span style="font-size: 20px;color: White; font-family: STHeiti, 'Microsoft YaHei', simsun, sans-serif, Arial;line-height: 50px;vertical-align: top;">
            @yield('title')
            </span>
            <ul class="nav">
                <li><a>欢迎您：@yield('user')</a></li>
                <li><a href="@yield('exit')?do=exit">退出</a></li>
            </ul>
            <ul class="themeList" id="themeList">
                <li theme="default"><div class="selected">蓝色</div></li>
                <li theme="green"><div>绿色</div></li>
                <li theme="purple"><div>紫色</div></li>
                <li theme="silver"><div>银色</div></li>
                <li theme="azure"><div>天蓝</div></li>
            </ul>
        </div>

        <!-- navMenu -->

    </div>

    <div id="leftside">
        <div id="sidebar_s">
            <div class="collapse">
                <div class="toggleCollapse"><div></div></div>
            </div>
        </div>
        <div id="sidebar">
            <div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

            <div class="accordion" fillSpace="sidebar">
                @yield('menu')
            </div>
        </div>
    </div>
    <div id="container">
        <div id="navTab" class="tabsPage">
            <div class="tabsPageHeader">
                <div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
                    <ul class="navTab-tab">
                        <li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
                    </ul>
                </div>
                <div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
                <div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
                <div class="tabsMore">more</div>
            </div>
            <ul class="tabsMoreList">
                <li><a href="javascript:;">我的主页</a></li>
            </ul>
            <div class="navTab-panel tabsPageContent layoutBox">
                <div class="page unitBox">
                    <div class="accountInfo">
                        <div class="alertInfo">
                        </div>
                    </div>
                    <div class="pageFormContent" layoutH="80" style="margin-right:230px">

                        @yield('content')

                    </div>

                    <div style="width:230px;position: absolute;top:60px;right:0" layoutH="80">
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<div id="footer">Copyright &copy; 2016 <a href="http://hx0576.com/" target="dialog">宏讯软件</a></div>

</body>
</html>