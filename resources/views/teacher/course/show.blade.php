@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="name" value="{{$name}}"/>
    <input type="hidden" name="teacher" value="{{is_null($teacher)?"":$teacher->id}}"/>
    <input type="hidden" name="day" value="{{$day}}"/>
    <input type="hidden" name="sex" value="{{$sex}}"/>
    <input type="hidden" name="class" value="{{is_null($class)?"":$class->id}}"/>
    <input type="hidden" name="major" value="{{is_null($major)?"":$major->id}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>课程关键字：</label>
            <input type="text" name="name" value="{{$name}}"/>
        </td>
        <td>
            <label>任课老师：</label>
            <input name="teacher.id" value="" type="hidden"/>
            <input name="teacher.info" type="text" lookupGroup="teacher"/>
            <a class="btnLook" href="{{url("/look/teacher")}}" lookupGroup="teacher">查找带回</a>
        </td>
        <td>
            <label>开课日：</label>
            <select name="day" class="combox">
                <option value="">不限</option>
                <option value="星期一">星期一</option>
                <option value="星期二">星期二</option>
                <option value="星期三">星期三</option>
                <option value="星期四">星期四</option>
                <option value="星期五">星期五</option>
                <option value="星期六">星期六</option>
                <option value="星期日">星期日</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <label>性别限制：</label>
            <select name="sex" class="combox">
                <option value="">不限</option>
                <option value="男">男</option>
                <option value="女">女</option>
            </select>
        </td>
        <td>
            <label>班级限制：</label>
            <input name="class.id" type="hidden" class="required"/>
            <input name="class.info" type="text" lookupGroup="class"/>
            <a class="btnLook" href="{{url("/look/class")}}" lookupGroup="class">查找带回</a>
        </td>
        <td>
            <label>专业限制：</label>
            <input name="major.id" value="" type="hidden"/>
            <input name="major.info" type="text" lookupGroup="major"/>
            <a class="btnLook" href="{{url("/look/major")}}" lookupGroup="major">查找带回</a>
        </td>
    </tr>
@endsection

@section('buttons')
    <li>
        <a class="add" href="{{url("/course/add")}}" target="dialog" rel="courseAdd" width="800" height="250">
            <span>添加</span>
        </a>
    </li>
    <li>
        <a class="edit" href="{{url("/course/edit")}}?id={id}" target="dialog" rel="courseEdit" width="800"
           height="250">
            <span>修改</span>
        </a>
    </li>
    <li class="line">line</li>
    <li>
        <a class="delete" href="{{url("/course/delete")}}?id={id}" target="ajaxTodo" title="确定要删除吗?">
            <span>删除</span>
        </a>
    </li>
    <li>
        <a class="icon" href="">
            <span>Excel导出</span>
        </a>
    </li>
@endsection

@section('table')
    <thead>
    <tr>
        <th>
            课程名
        </th>
        <th>
            授课老师
        </th>
        <th>
            开课日期
        </th>
        <th>
            开课时间
        </th>
        <th>
            报名总量
        </th>
        <th>
            报名情况
        </th>
        <th>
            性别限制
        </th>
        <th>
            班级限制
        </th>
        <th>
            专业限制
        </th>
        <th>
            审核状态
        </th>
        <th>
            审核人
        </th>
        <th>
            选课状态
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr target="id" rel="{{$course->id}}">
            <td>{{$course->name}}</td>
            <td>{{$course->Teacher->name}}</td>
            <td>{{$course->dayOfWeek}}</td>
            <td>{{$course->classTime}}</td>
            <td>{{$course->count}}</td>
            <td>{{$course->selected}}</td>
            <td>{{$course->sex==""?"不限制":$course->sex}}</td>
            <td>
                {{$course->class==0?"不限制":($course->studentClass->grade.$course->studentClass->Major->name.$course->studentClass->num."班")}}
            </td>
            <td>{{$course->major==0?"不限制":($course->Major->num."|".$course->Major->name)}}</td>
            <td>
                @if($course->isPass)
                    ✓
                @else
                    <a class="btnSelect" href="{{url("course/pass")}}?id={{$course->id}}" target="ajaxTodo"
                       title="审核发布这门课程？"></a>
                @endif
            </td>
            <td>{{$course->checker}}</td>
            <td>
                @if($course->isClose)
                    已关闭
                    <a class="btnSelect" href="{{url("course/operate")}}?id={{$course->id}}" target="ajaxTodo" title="开放本门课程的选课通道？"></a>
                @else
                    已开启
                    <a class="btnDel" href="{{url("course/operate")}}?id={{$course->id}}" target="ajaxTodo" title="关闭本门课程的选课通道？"></a>
                @endif
            </td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/course/view"))