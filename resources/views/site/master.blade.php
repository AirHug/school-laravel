<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title")</title>
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
    @yield("css")
</head>
<body>
@yield("body")
@yield("javascript")
</body>
</html>
