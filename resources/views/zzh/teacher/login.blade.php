<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>东方中学后台管理系统--教师平台</title>
    <link href="{{url('themes/css/login.css')}}" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="login">
    <div id="login_header">
        <h1 class="login_logo">
        </h1>
        <div class="login_headerContent">
            <img src="{{url('themes/default/images/login_title.png')}}" style="width: 130px;padding: 3px 75px 0;"/>
        </div>
    </div>
    <div id="login_content">
        <div class="loginForm">
            <form action="" method="post">
                <p>
                    <label>用户名：</label>
                    <input type="text" name="username" size="16" class="login_input"/>
                    {{ csrf_field() }}
                </p>
                <p>
                    <label>密码：</label>
                    <input type="password" name="password" size="16" class="login_input"/>
                </p>
                <p>
                    <label>验证码：</label>
                    <input name="code" class="code" type="text" size="5"/>
                    <span><img src="{{captcha_src('flat')}}" alt="" width="75" height="24"
                               onclick="this.src='{{captcha_src('flat')}}' + Math.random();"/></span>
                </p>
                <p>
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <span style="color: #fa0000;">{{ $error }}</span><br>
                        @endforeach
                    @endif
                    @if(is_null(session("login_errors")))
                        <span style="color: #fa0000;">{{ session("login_errors") }}</span><br>
                    @endif
                </p>
                <div class="login_bar">
                    <input class="sub" type="submit" value=" "/>
                </div>
            </form>
        </div>
        <div class="login_banner"><img src="{{url('themes/default/images/login_banner.jpg')}}"/></div>
        <div class="login_main">
            <ul class="helpList">
                <li><a href="#">下载U盾驱动程序</a></li>
                <li><a href="#">如何安装U盾驱动程序？</a></li>
                <li><a href="#">忘记密码怎么办？</a></li>
                <li><a href="#">为什么登录失败？</a></li>
            </ul>
            <div class="login_inner">
                <p>东方中学后台管理系统上线测试！</p>
            </div>
        </div>
    </div>
    <div id="login_footer">
        Copyright &copy; All Rights Reserved.
    </div>
</div>
</body>
</html>-