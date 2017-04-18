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
        <div style="line-height: 23px;">
            @foreach($studentCourses as $studentCourse)
                @if($studentCourse->year==\Carbon\Carbon::now()->year && $studentCourse->semester == (\Carbon\Carbon::now()->month<6?0:1))
                    已选修课程：{{$studentCourse->course->name}}   主讲老师：{{$studentCourse->course->Teacher->name}}
                    上课时间：{{$studentCourse->course->dayOfWeek.$studentCourse->course->classTime}}
                @else
                    你还没选课
                @endif
            @endforeach
        </div>
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
            余量
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
            选课
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
            <td>{{$course->count-$course->selected}}</td>
            <td>{{$course->sex==""?"不限制":$course->sex}}</td>
            <td>
                {{$course->class==0?"不限制":($course->studentClass->grade.$course->studentClass->Major->name.$course->studentClass->num."班")}}
            </td>
            <td>{{$course->major==0?"不限制":($course->Major->num."|".$course->Major->name)}}</td>
            <td>
                <a class="btnSelect" href="{{url("course/select")}}?id={{$course->id}}" target="ajaxTodo"
                   title="选修{{$course->name}}？"></a>
            </td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/course/student"))