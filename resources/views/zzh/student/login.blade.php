
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>东方中学</title>
    <!-- /配置 -->
    <meta name="Keywords" content="东方中心" />
    <meta name="Description" content="东方中心" />
    <meta name="copyright" content="东方中心版权所有" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
    <meta name="author" content="LXX" />
    <meta name="robots" content="all" />
    <meta name="renderer" content="webkit">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <!-- 配置/ -->
    <!-- /样式 -->
    <link href="{{asset("site/css/login.min.css")}}" rel="stylesheet" />
    <!-- 样式/ -->
    <!--[if lte IE 8]>
    <link href="{{asset("site/css/compatible.min.css")}}" rel="stylesheet" />
    <script src="{{asset("site/js/html5shiv.min.js")}}"></script>
    <script src="{{asset("site/js/respond.min.js")}}"></script>
    <script src="{{asset("site/js/respond.proxy.min.js")}}"></script>
    <![endif]-->
</head>
<body>
<div class="wrap">
    <div class="banner-show" id="js_ban_content">
        <div class="cell bns-01">
            <div class="con">
                <img src="{{asset("site/img/login/1.jpg")}}" /></div>
        </div>
        <div class="cell bns-02" style="display: none;">
            <div class="con">
                <img src="{{asset("site/img/login/2.jpg")}}" /></div>
        </div>
    </div>
    <div class="banner-control" id="js_ban_button_box"><a href="javascript:;" class="left">左</a> <a href="javascript:;" class="right">右</a> </div>

    <div class="container">
        <div class="register-box">
            <div class="reg-slogan">用户登录</div>
            <form id="studentForm" action="{{url("zzh")}}" method="post">
                <div class="reg-form" id="js-form-mobile">
                    <div class="cell">
                        <input type="text" name="username" id="js-mobile_ipt" placeholder="学生学号" class="text" maxlength="11" />
                        {{ csrf_field() }}
                    </div>
                    <div class="cell">
                        <input type="password" name="password" id="js-mobile_pwd_ipt" class="text" placeholder="密码" />
                    </div>
                    <div class="cell vcode">
                        <input type="text" name="code" id="js-mobile_vcode_ipt" placeholder="输入验证码" class="text" maxlength="6" />
                        <a href="javascript:;" id="js-get_mobile_vcode" class="button">
                            <img style="left: 0; width: 100%;" src="{{captcha_src('flat')}}" alt="Alternate Text" onclick="this.src='{{captcha_src('flat')}}' + Math.random();"/>
                        </a>
                    </div>
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <span style="color: #fa0000;">{{ $error }}</span><br>
                        @endforeach
                    @endif
                    @if(is_null(session("login_errors")))
                        <span style="color: #fa0000;">{{ session("login_errors") }}</span><br>
                    @endif
                    <div class="bottom ZZHsubmit"><a id="js-mobile_btn"class="button btn-blue">登录</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset("site/js/jquery.min.js")}}"></script>
<script src="{{asset("site/js/login.min.js")}}"></script>
<script type="text/javascript">
    $(".ZZHsubmit").click(function () {
        $("#studentForm").submit();
    });
</script>
</body>
</html>
