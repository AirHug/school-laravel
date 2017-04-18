@extends('container.form')

@section('type')
    action="{{url("student")}}" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <div class="panel collapse" minH="100" defH="">
        <h1>学生基本信息</h1>
        <div>
            <table>
                <tr>
                    <td>
                        <p>
                            <label>学号：</label>
                            <input name="number" type="text" size="30" value="{{$student->number}}"/>
                            <input name="id" type="hidden" size="30" value="{{$student->id}}"/>
                        </p>
                    </td>
                    <td>
                        <p>
                            <label>姓名：</label>
                            <input name="name" type="text" size="30" class="required" value="{{$student->name}}"/>
                        </p>
                    </td>
                    <td rowspan="2">
                        <label style="line-height: 63px;">学生照片：</label>
                        <img src="{{$student->photo!=""?asset("/files/student/".$student->photo):asset("/files/head.jpg")}}" alt="" height="63">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            <label>姓名拼音：</label>
                            <input name="nameSpell" type="text" size="30" value="{{$student->nameSpell}}"/>
                        </p>
                    </td>
                    <td>
                        <p>
                            <label>照片：</label>
                            <input name="photo" type="file" size="30"/>
                        </p>
                    </td>
                </tr>
            </table>
            <div class="divider"></div>
            <p>
                <label>性别：</label>
                <input type="radio" name="sex" value="男" class="required" {{$student->sex=="男"?"checked='checked'":""}}>男
                <input type="radio" name="sex" value="女" class="required" {{$student->sex=="女"?"checked='checked'":""}}>女
            </p>
            <p>
                <label>生日：</label>
                <input type="text" name="birthday" class="date" dateFmt="yyyy-MM-dd" readonly="true" value="{{date("Y-m-d",strtotime($student->birthday))}}"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>招生季节：</label>
                <select name="season">
                    <option value="{{$student->season}}">{{$student->season}}</option>
                    <option value="春季招生">春季招生</option>
                    <option value="秋季招生">秋季招生</option>
                    <option value="其他">其他</option>
                </select>
            </p>
            <p>
                <label>证件类型：</label>
                <select name="idType">
                    <option value="{{$student->idType}}">{{$student->idType}}</option>
                    <option value="身份证">身份证</option>
                    <option value="居住证">居住证</option>
                    <option value="签证">签证</option>
                    <option value="护照">护照</option>
                    <option value="户口本">户口本</option>
                    <option value="军人证">军人证</option>
                    <option value="团员证">团员证</option>
                    <option value="党员证">党员证</option>
                    <option value="港澳通行证">港澳通行证</option>
                </select>
            </p>
            <p>
                <label>证件号码：</label>
                <input name="idNum" type="text" size="30" value="{{$student->idNum}}"/>
            </p>
            <p>
                <label>联系电话：</label>
                <input name="mobile" type="text" size="30" value="{{$student->mobile}}"/>
            </p>
            <p>
                <label>班级：</label>
                <input name="class.id" type="hidden" class="required" value="{{$student->studentClass->id}}"/>
                <input name="class.info" type="text" lookupGroup="class" value="{{$student->studentClass->grade.$student->studentClass->Major->name.$student->studentClass->num}}班"/>
                <a class="btnLook" href="{{url("/look/class")}}" lookupGroup="class">查找带回</a>
            </p>
            <p>
                <label>年级：</label>
                <input name="class.grade" type="text" size="30" value="{{$student->grade}}"/>
            </p>
            <p>
                <label>专业简称：</label>
                <input name="class.major" type="text" size="30" value="{{$student->major}}"/>
            </p>
            <p>
                <label>学籍转入类型：</label>
                <input name="enrollType" type="text" size="30" value="{{$student->enrollType}}"/>
            </p>
            <p>
                <label>学生类别：</label>
                <input name="type" type="text" size="30" value="{{$student->type}}"/>
            </p>
            <p>
                <label>学习形式：</label>
                <input name="studyType" type="text" size="30" value="{{$student->studyType}}"/>
            </p>
            <p>
                <label>入学方式：</label>
                <input name="entranceType" type="text" size="30" value="{{$student->entranceType}}"/>
            </p>
            <p>
                <label>就读方式：</label>
                <input type="radio" name="isResident" value="1" class="required" {{$student->isResident?"checked='checked'":""}}>寄宿
                <input type="radio" name="isResident" value="0" class="required" {{$student->isResident?"":"checked='checked'"}}>走读
            </p>
            <p>
                <label>国际/地区：</label>
                <input name="nation" type="text" size="30" value="{{$student->nation}}"/>
            </p>
            <p>
                <label>港澳台侨外：</label>
                <input type="radio" name="isHMTO" value="1" class="required" {{$student->isHMTO?"checked='checked'":""}}>是
                <input type="radio" name="isHMTO" value="0" class="required" {{$student->isHMTO?"":"checked='checked'"}}>否
            </p>
            <p>
                <label>婚姻情况：</label>
                <input type="radio" name="isMarried" value="1" class="required" {{$student->isMarried?"checked='checked'":""}}>已婚
                <input type="radio" name="isMarried" value="0" class="required" {{$student->isMarried?"":"checked='checked'"}}>未婚
            </p>
            <p>
                <label>乘火车区间：</label>
                <input name="trainStation" type="text" size="30" value="{{$student->trainStation}}"/>
            </p>
            <p>
                <label>是否随迁子女：</label>
                <input type="radio" name="followingChild" value="1" class="required" {{$student->followingChild?"checked='checked'":""}}>是
                <input type="radio" name="followingChild" value="0" class="required" {{$student->followingChild?"":"checked='checked'"}}>否
            </p>
            <p>
                <label>生源地行政码：</label>
                <input name="sourceCode" type="text" size="30" value="{{$student->sourceCode}}"/>
            </p>
            <p>
                <label>出生地行政区划码：</label>
                <input name="birthCode" type="text" size="30" value="{{$student->birthCode}}"/>
            </p>
            <p>
                <label>籍贯地行政区划码：</label>
                <input name="nativeCode" type="text" size="30" value="{{$student->nativeCode}}"/>
            </p>
            <p>
                <label>户口所在地详细地址：</label>
                <input name="address" type="text" size="30" value="{{$student->address}}"/>
            </p>
            <p>
                <label>所属派出所：</label>
                <input name="policeStation" type="text" size="30" value="{{$student->policeStation}}"/>
            </p>
            <p>
                <label>户口所在地区划码：</label>
                <input name="accountCode" type="text" size="30" value="{{$student->accountCode}}"/>
            </p>
            <p>
                <label>户口性质：</label>
                <select name="accountType">
                    <option value="{{$student->accountType}}">{{$student->accountType}}</option>
                    <option value="农村户口">农村户口</option>
                    <option value="城镇户口">城镇户口</option>
                </select>
            </p>
            <p>
                <label>学生居住地类型：</label>
                <select name="dwellingType" class="combox">
                    <option value="{{$student->dwellingType}}">{{$student->dwellingType}}</option>
                    <option value="农村">农村</option>
                    <option value="城市">城市</option>
                </select>
            </p>
            <p>
                <label>入学年月：</label>
                <input type="text" name="date" class="date" dateFmt="yyyy-MM-dd" readonly="true" value="{{date("Y-m-d",strtotime($student->date))}}"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>民族：</label>
                <input name="native" type="text" size="30" value="{{$student->native}}"/>
            </p>
            <p>
                <label>政治面貌：</label>
                <select name="politics">
                    <option value="{{$student->politics}}">{{$student->politics}}</option>
                    <option value="普通公民">普通公民</option>
                    <option value="无党派民主人士">无党派民主人士</option>
                    <option value="台盟盟员">台盟盟员</option>
                    <option value="九三学社社员 ">九三学社社员 </option>
                    <option value="致公党党员">致公党党员</option>
                    <option value="农工党党员">农工党党员</option>
                    <option value="民进会员">民进会员</option>
                    <option value="民建会员">民建会员</option>
                    <option value="民盟盟员">民盟盟员</option>
                    <option value="民革党员">民革党员</option>
                    <option value="共青团员">共青团员</option>
                    <option value="中共党员">中共党员</option>
                </select>
            </p>
            <p>
                <label>健康状况：</label>
                <input name="health" type="text" size="30" value="{{$student->health}}"/>
            </p>
            <p>
                <label>学生来源：</label>
                <input name="source" type="text" size="30" value="{{$student->source}}"/>
            </p>
            <p>
                <label>招生对象：</label>
                <input name="enrollObject" type="text" size="30" value="{{$student->enrollObject}}"/>
            </p>
            <p>
                <label>联招合作类型：</label>
                <input type="radio" name="isCooperate" value="1" class="required" {{$student->isCooperate?"checked='checked'":""}}>是
                <input type="radio" name="isCooperate" value="0" class="required" {{$student->isCooperate?"":"checked='checked'"}}>否
            </p>
            <p>
                <label>联招合作办学形式：</label>
                <input name="cooperateType" type="text" size="30" value="{{$student->cooperateType}}"/>
            </p>
            <p>
                <label>联招合作学校代码：</label>
                <input name="cooperateSchool" type="text" size="30" value="{{$student->cooperateSchool}}"/>
            </p>
            <p>
                <label>校外教学点：</label>
                <input name="outSchoolPoint" type="text" size="30" value="{{$student->outSchoolPoint}}"/>
            </p>
            <p>
                <label>分段培养方式：</label>
                <input name="segmentFoster" type="text" size="30" value="{{$student->segmentFoster}}"/>
            </p>
            <p>
                <label>英文姓名：</label>
                <input name="englishName" type="text" size="30" value="{{$student->englishName}}"/>
            </p>
            <p>
                <label>家庭现地址：</label>
                <input name="homeAddress" type="text" size="30" value="{{$student->homeAddress}}"/>
            </p>
            <p>
                <label>家庭邮政编码：</label>
                <input name="homeCode" type="text" size="30" value="{{$student->homeCode}}"/>
            </p>
            <p>
                <label>家庭电话：</label>
                <input name="homePhone" type="text" size="30" value="{{$student->homePhone}}"/>
            </p>
            <p>
                <label>邮箱/其他联系方式：</label>
                <input name="contact" type="text" size="30" value="{{$student->contact}}"/>
            </p>
        </div>
    </div>
    <div class="panel collapse" minH="100" defH="">
        <h1>学生相关成员1信息</h1>
        <div>
            <p>
                <label>姓名：</label>
                <input name="memberName1" type="text" size="30" value="{{$student->memberName1}}"/>
            </p>
            <p>
                <label>关系：</label>
                <input name="memberRelation1" type="text" size="30" value="{{$student->memberRelation1}}"/>
            </p>
            <p>
                <label>是否监护人：</label>
                <input type="radio" name="isGuardian1" value="1" class="required" {{$student->isGuardian1?"checked='checked'":""}}>是
                <input type="radio" name="isGuardian1" value="0" class="required" {{$student->isGuardian1?"":"checked='checked'"}}>否
            </p>
            <p>
                <label>联系电话：</label>
                <input name="memberPhone1" type="text" size="30" value="{{$student->memberPhone1}}"/>
            </p>
            <p>
                <label>出生年月：</label>
                <input type="text" name="memberBirthday1" class="date" dateFmt="yyyy-MM-dd" readonly="true" value="{{date("Y-m-d",strtotime($student->memberBirthday1))}}"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>身份证件类型：</label>
                <select name="memberIdType1">
                    <option value="{{$student->memberIdType1}}">{{$student->memberIdType1}}</option>
                    <option value="身份证">身份证</option>
                    <option value="居住证">居住证</option>
                    <option value="签证">签证</option>
                    <option value="护照">护照</option>
                    <option value="户口本">户口本</option>
                    <option value="军人证">军人证</option>
                    <option value="团员证">团员证</option>
                    <option value="党员证">党员证</option>
                    <option value="港澳通行证">港澳通行证</option>
                </select>
            </p>
            <p>
                <label>身份证件号：</label>
                <input name="memberIdNumber1" type="text" size="30" value="{{$student->memberIdNumber1}}"/>
            </p>
            <p>
                <label>民族：</label>
                <input name="memberNative1" type="text" size="30" value="{{$student->memberNative1}}"/>
            </p>
            <p>
                <label>政治面貌：</label>
                <select name="memberPolitics1">
                    <option value="{{$student->memberPolitics1}}">{{$student->memberPolitics1}}</option>
                    <option value="普通公民">普通公民</option>
                    <option value="无党派民主人士">无党派民主人士</option>
                    <option value="台盟盟员">台盟盟员</option>
                    <option value="九三学社社员 ">九三学社社员 </option>
                    <option value="致公党党员">致公党党员</option>
                    <option value="农工党党员">农工党党员</option>
                    <option value="民进会员">民进会员</option>
                    <option value="民建会员">民建会员</option>
                    <option value="民盟盟员">民盟盟员</option>
                    <option value="民革党员">民革党员</option>
                    <option value="共青团员">共青团员</option>
                    <option value="中共党员">中共党员</option>
                </select>
            </p>
            <p>
                <label>健康状况：</label>
                <input name="memberHealth1" type="text" size="30" value="{{$student->memberHealth1}}"/>
            </p>
            <p>
                <label>工作或学习单位：</label>
                <input name="memberWork1" type="text" size="30" value="{{$student->memberWork1}}"/>
            </p>
            <p>
                <label>职务：</label>
                <input name="memberDuty1" type="text" size="30" value="{{$student->memberDuty1}}"/>
            </p>
        </div>
    </div>
    <div class="panel collapse" minH="100" defH="">
        <h1>学生相关成员2信息</h1>
        <div>
            <p>
                <label>姓名：</label>
                <input name="memberName2" type="text" size="30" value="{{$student->memberName2}}"/>
            </p>
            <p>
                <label>关系：</label>
                <input name="memberRelation2" type="text" size="30" value="{{$student->memberRelation2}}"/>
            </p>
            <p>
                <label>是否监护人：</label>
                <input type="radio" name="isGuardian2" value="1" class="required" {{$student->isGuardian2?"checked='checked'":""}}>是
                <input type="radio" name="isGuardian2" value="0" class="required" {{$student->isGuardian2?"":"checked='checked'"}}>否
            </p>
            <p>
                <label>联系电话：</label>
                <input name="memberPhone2" type="text" size="30" value="{{$student->memberPhone2}}"/>
            </p>
            <p>
                <label>出生年月：</label>
                <input type="text" name="memberBirthday2" class="date" dateFmt="yyyy-MM-dd" readonly="true" value="{{date("Y-m-d",strtotime($student->memberBirthday2))}}"/>
                <a class="inputDateButton" href="javascript:;">选择</a>
            </p>
            <p>
                <label>身份证件类型：</label>
                <select name="memberIdType2">
                    <option value="{{$student->memberIdType2}}">{{$student->memberIdType2}}</option>
                    <option value="身份证">身份证</option>
                    <option value="居住证">居住证</option>
                    <option value="签证">签证</option>
                    <option value="护照">护照</option>
                    <option value="户口本">户口本</option>
                    <option value="军人证">军人证</option>
                    <option value="团员证">团员证</option>
                    <option value="党员证">党员证</option>
                    <option value="港澳通行证">港澳通行证</option>
                </select>
            </p>
            <p>
                <label>身份证件号：</label>
                <input name="memberIdNumber2" type="text" size="30" value="{{$student->memberIdNumber2}}"/>
            </p>
            <p>
                <label>民族：</label>
                <input name="memberNative2" type="text" size="30" value="{{$student->memberNative2}}"/>
            </p>
            <p>
                <label>政治面貌：</label>
                <select name="memberPolitics2">
                    <option value="{{$student->memberPolitics2}}">{{$student->memberPolitics2}}</option>
                    <option value="普通公民">普通公民</option>
                    <option value="无党派民主人士">无党派民主人士</option>
                    <option value="台盟盟员">台盟盟员</option>
                    <option value="九三学社社员 ">九三学社社员 </option>
                    <option value="致公党党员">致公党党员</option>
                    <option value="农工党党员">农工党党员</option>
                    <option value="民进会员">民进会员</option>
                    <option value="民建会员">民建会员</option>
                    <option value="民盟盟员">民盟盟员</option>
                    <option value="民革党员">民革党员</option>
                    <option value="共青团员">共青团员</option>
                    <option value="中共党员">中共党员</option>
                </select>
            </p>
            <p>
                <label>健康状况：</label>
                <input name="memberHealth2" type="text" size="30" value="{{$student->memberHealth2}}"/>
            </p>
            <p>
                <label>工作或学习单位：</label>
                <input name="memberWork2" type="text" size="30" value="{{$student->memberWork2}}"/>
            </p>
            <p>
                <label>职务：</label>
                <input name="memberDuty2" type="text" size="30" value="{{$student->memberDuty2}}"/>
            </p>
        </div>
    </div>
@endsection