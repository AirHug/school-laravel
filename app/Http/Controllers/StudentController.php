<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentClass;
use App\Student;
use Carbon\Carbon;
use App\Http\Requests;

class StudentController extends Controller
{

    /**
     * Show ListView
     *
     * @param Request $request
     * @return response
     */
    public function show(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $name_key = is_null($request->input('name')) ? "" : $request->input('name');
        $numPerPage = is_null($request->input('numPerPage')) ? 20 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));
        $class_key = is_null($request->input("class")) ? null : studentClass::find($request->input("class"));
        $students = Student::where('name', 'like', "%" . $name_key . "%")
            ->orderBy('id', 'asc');
        $count = $students->count();
        $students = $students->paginate($numPerPage);


        $result = [
            'students' => $students,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'name_key' => $name_key,
            'totalCount' => $count,
            'class' => $class_key
        ];

        return view('teacher.student.show', $result);
    }

    /**
     * Add DataView
     *
     * @return response
     */
    public function add()
    {
        return view('teacher.student.add');
    }

    /**
     * Edit DataView
     *
     * @param Request $request
     * @return response
     */
    public function edit(Request $request)
    {
        $student = Student::find($request->query("id"));
        return view('teacher.student.edit', compact("student"));
    }

    /**
     * Delete DataView
     *
     * @param Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        $flag = Student::destroy($request->query("id"));
        if ($flag > 0) {
            return response()->json([
                'statusCode' => '200',
                'message' => '删除成功！',
                'navTabId' => 'studentView',
                'rel' => '',
                'callbackType' => '',
                'forwardUrl' => ''
            ]);
        } else {
            return response()->json([
                'statusCode' => '300',
                'message' => '操作失败！'
            ]);
        }
    }

    /**
     * Add Data
     *
     * @param Request $request
     * @return response
     */
    public function data(Request $request)
    {
        try {
            $student = new Student();
            if ($request->input("id") != "-1") {
                $student = Student::find($request->input("id"));
            }

            if (strlen($student->password) == 0) $student->password = bcrypt("1949101");
            if ($request->hasFile("photo")) {
                $student->photo = time(Carbon::now()) . "." . $request->file("photo")->getClientOriginalExtension();
                $request->file("photo")->move('files/student', $student->photo);
            }
            $student->number = $request->input("number");
            $student->class = $request->input("class_id");
            $student->name = $request->input("name");
            $student->sex = $request->input("sex");
            $student->birthday = $request->input("birthday");
            $student->idType = $request->input("idType");
            $student->idNum = $request->input("idNum");
            $student->enrollObject = $request->input("enrollObject");
            $student->enrollType = $request->input("enrollType");
            $student->nameSpell = $request->input("nameSpell");
            $student->type = $request->input("type");
            $student->studyType = $request->input("studyType");
            $student->entranceType = $request->input("entranceType");
            $student->isResident = $request->input("isResident");
            $student->isHMTO = $request->input("isHMTO");
            $student->isMarried = $request->input("isMarried");
            $student->trainStation = $request->input("trainStation");
            $student->followingChild = $request->input("followingChild");
            $student->sourceCode = $request->input("sourceCode");
            $student->birthCode = $request->input("birthCode");
            $student->nativeCode = $request->input("nativeCode");
            $student->policeStation = $request->input("policeStation");
            $student->accountCode = $request->input("accountCode");
            $student->accountType = $request->input("accountType");
            $student->dwellingType = $request->input("dwellingType");
            $student->grade = $request->input("class_grade");
            $student->season = $request->input("season");
            $student->date = $request->input("date");
            $student->major = $request->input("class_major");
            $student->native = $request->input("native");
            $student->politics = $request->input("politics");
            $student->health = $request->input("health");
            $student->source = $request->input("source");
            $student->mobile = $request->input("mobile");
            $student->isCooperate = $request->input("isCooperate");
            $student->cooperateType = $request->input("cooperateType");
            $student->cooperateSchool = $request->input("cooperateSchool");
            $student->outSchoolPoint = $request->input("outSchoolPoint");
            $student->segmentFoster = $request->input("segmentFoster");
            $student->englishName = $request->input("englishName");
            $student->contact = $request->input("contact");
            $student->homeAddress = $request->input("homeAddress");
            $student->homeCode = $request->input("homeCode");
            $student->homePhone = $request->input("homePhone");

            $student->memberName1 = $request->input("memberName1");
            $student->memberRelation1 = $request->input("memberRelation1");
            $student->isGuardian1 = $request->input("isGuardian1");
            $student->memberPhone1 = $request->input("memberPhone1");
            $student->memberBirthday1 = $request->input("memberBirthday1");
            $student->memberIdType1 = $request->input("memberIdType1");
            $student->memberIdNumber1 = $request->input("memberIdNumber1");
            $student->memberNative1 = $request->input("memberNative1");
            $student->memberPolitics1 = $request->input("memberPolitics1");
            $student->memberHealth1 = $request->input("memberHealth1");
            $student->memberWork1 = $request->input("memberWork1");
            $student->memberDuty1 = $request->input("memberDuty1");

            $student->memberName2 = $request->input("memberName2");
            $student->memberRelation2 = $request->input("memberRelation2");
            $student->isGuardian2 = $request->input("isGuardian2");
            $student->memberPhone2 = $request->input("memberPhone2");
            $student->memberBirthday2 = $request->input("memberBirthday2");
            $student->memberIdType2 = $request->input("memberIdType2");
            $student->memberIdNumber2 = $request->input("memberIdNumber2");
            $student->memberNative2 = $request->input("memberNative2");
            $student->memberPolitics2 = $request->input("memberPolitics2");
            $student->memberHealth2 = $request->input("memberHealth2");
            $student->memberWork2 = $request->input("memberWork2");
            $student->memberDuty2 = $request->input("memberDuty2");

            $student->save();
            return response()->json([
                'statusCode' => '200',
                'message' => '操作成功！',
                'navTabId' => 'studentView',
                'rel' => '',
                'callbackType' => 'closeCurrent',
                'forwardUrl' => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => '300',
                'message' => '操作失败！'
            ]);
        }
    }
}
