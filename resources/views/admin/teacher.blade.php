@extends('admin.master')

@section('menu')
    <div class="accordionHeader">
        <h2><span>Folder</span>网站信息管理</h2>
    </div>
    <div class="accordionContent">
        <ul class="tree treeFolder">
            <li><a>浮动广告管理</a>
                <ul>
                    <li><a href="{{url("/advertisement/view")}}" target="navtab" rel="advertisementView">广告</a></li>
                    <li><a href="{{url("/advertisement/add")}}" target="dialog" rel="advertisementAdd">广告添加</a></li>
                </ul>
            </li>
            <li><a>主页滚动图管理</a>
                <ul>
                    <li><a href="{{url("/banner/view")}}" target="navtab" rel="bannerView">滚动图</a></li>
                    <li><a href="{{url("/banner/add")}}" target="dialog" rel="bannerAdd">滚动图添加</a></li>
                </ul>
            </li>
            <li><a>友情链接</a>
                <ul>
                    <li><a href="{{url("/link/view")}}" target="navtab" rel="linkView">友情链接</a></li>
                    <li><a href="{{url("/link/add")}}" target="dialog" rel="linkAdd">友情链接添加</a></li>
                </ul>
            </li>
            <li><a>文章管理</a>
                <ul>
                    <li><a href="{{url("/article/view")}}" target="navTab" rel="articleView">文章</a></li>
                    <li><a href="{{url("/article/add")}}" target="dialog" rel="articleAdd" width="1200" height="800">文章添加</a>
                    </li>
                    <li><a href="{{url("/catalog/view")}}" target="navTab" rel="catalogView">栏目</a></li>
                    <li><a href="{{url("/catalog/add")}}" target="dialog" rel="catalogAdd" width="500"
                           height="450">栏目添加</a></li>
                </ul>
            </li>
            <li><a>通知公告</a>
                <ul>
                    <li><a href="{{url("/notice/view")}}" target="navTab" rel="noticeView">通知公告</a></li>
                    <li><a href="{{url("/notice/add")}}" target="dialog" rel="noticeAdd" width="1200" height="800">通知公告添加</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="accordionHeader">
        <h2><span>Folder</span>学校办公模块</h2>
    </div>
    <div class="accordionContent">
        <ul class="tree treeFolder">
            <li><a>老师请假管理</a>
                <ul>
                    <li><a href="{{url("/leaveNote/teacher")}}" target="navTab" rel="leaveView">查看老师请假表</a></li>
                    <li><a href="{{url("/leaveNote/add/teacher")}}" target="dialog" rel="teacherLeaveAdd">创建老师请假单</a>
                    </li>
                </ul>
            </li>
            <li><a>学生请假管理</a>
                <ul>
                    <li><a href="{{url("/leaveNote/student")}}" target="navTab" rel="leaveView">查看学生请假表</a></li>
                    <li><a href="{{url("/leaveNote/add/student")}}" target="dialog" rel="studentLeaveAdd">创建学生请假单</a>
                    </li>
                </ul>
            </li>
            <li><a>教学资料共享</a>
                <ul>
                    <li><a href="{{url("/resource/view")}}" target="navTab" rel="resourceView">查看教学资料</a></li>
                    <li><a href="{{url("/resource/add")}}" target="dialog" rel="resourceAdd">添加教学资料</a></li>
                </ul>
            </li>
            <li><a>选课审批系统</a>
                <ul>
                    <li><a href="{{url("/course/view")}}" target="navTab" rel="courseView">查看选修课资料</a></li>
                    <li><a href="{{url("/courseLog/view")}}" target="navTab" rel="courseLogView">查看选修课报名情况</a></li>
                    <li><a href="{{url("/course/add")}}" target="dialog" rel="courseAdd" width="800" height="500">添加选修课资料</a>
                    </li>
                </ul>
            </li>
            <li><a>资产管理系统</a>
                <ul>
                    <li><a href="{{url("/asset/view")}}" target="navTab" rel="assetView">资产仓库</a></li>
                    <li><a href="{{url("/asset/add")}}" target="dialog" rel="assetAdd">导入资产项目</a></li>
                    <li><a href="{{url("/application/view")}}" target="navTab" rel="applicationView">设备申报请求列表</a></li>
                    <li><a href="{{url("/application/add")}}" target="dialog" rel="applicationAdd">租用/维修/采购申报</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="accordionHeader">
        <h2><span>Folder</span>人员管理模块</h2>
    </div>
    <div class="accordionContent">
        <ul class="tree treeFolder">
            <li><a>老师管理</a>
                <ul>
                    <li><a href="{{url("/teacher/view")}}" target="navTab" rel="teacherView">老师人员表</a></li>
                    <li><a href="{{url("/teacher/add")}}" target="dialog" rel="teacherAdd" width="800"
                           height="350">老师导入</a></li>
                    <li><a href="{{url("/power/view")}}" target="navTab" rel="powerView">权限组</a></li>
                    <li><a href="{{url("/power/add")}}" target="dialog" rel="powerAdd" width="450"
                           height="800">权限组添加</a></li>
                </ul>
            </li>
            <li><a>学生管理</a>
                <ul>
                    <li><a href="{{url("/student/view")}}" target="navTab" rel="studentView">学生表</a></li>
                    <li><a href="{{url("/student/add")}}" target="dialog" rel="studentAdd" width="1280" height="800">添加学生</a>
                    </li>
                    <li><a href="{{url("/student/excelAdd")}}" target="dialog" rel="studentExcelAdd">学生文件导入</a></li>
                </ul>
            </li>
            <li><a>班级专业管理</a>
                <ul>
                    <li><a href="{{url("/class/view")}}" target="navTab" rel="classView">班级</a></li>
                    <li><a href="{{url("/class/add")}}" target="dialog" rel="classAdd">添加班级</a></li>
                    <li><a href="{{url("/major/view")}}" target="navTab" rel="majorView">专业</a></li>
                    <li><a href="{{url("/major/add")}}" target="dialog" rel="majorAdd">添加专业</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="accordionHeader">
        <h2><span>Folder</span>个人信息管理</h2>
    </div>
    <div class="accordionContent">
        <ul class="tree treeFolder">
            <li><a>个人账户管理</a>
                <ul>
                    <li><a href="" target="dialog" rel="updatePsw">密码修改</a></li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('content')

@endsection

@section('user',Auth::user()->name)

@section('title',"东方中学后台管理系统--站点后台")

@section('exit',url("hx"))