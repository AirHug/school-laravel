<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Major;
use App\Teacher;
use App\Power;
use App\studentClass;
use App\Student;

class LookUpController extends Controller
{

    /**
     * Look up article
     *
     * @param Request $request
     * @return response
     */
    public function article(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $keyWord = is_null($request->input('keywords')) ? "" : $request->input('keywords');
        $numPerPage = is_null($request->input('numPerPage')) ? 10 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));

        $articles = Article::where('title', 'like', "%" . $keyWord . "%")
            ->where('catalog', '-1')
            ->orderBy('id', 'asc')
            ->paginate($numPerPage);

        $count = Article::where('title', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'articles' => $articles,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('lookUp.article', $result);
    }

    /**
     * Look up major
     *
     * @param Request $request
     * @return response
     */
    public function major(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $keyWord = is_null($request->input('keywords')) ? "" : $request->input('keywords');
        $numPerPage = is_null($request->input('numPerPage')) ? 10 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));

        $majors = Major::where('name', 'like', "%" . $keyWord . "%")
            ->orderBy('id', 'asc')
            ->paginate($numPerPage);

        $count = Major::where('name', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'majors' => $majors,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('lookUp.major', $result);
    }

    /**
     * Look up teacher
     *
     * @param Request $request
     * @return response
     */
    public function teacher(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $keyWord = is_null($request->input('keywords')) ? "" : $request->input('keywords');
        $numPerPage = is_null($request->input('numPerPage')) ? 10 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));

        $teachers = Teacher::where('name', 'like', "%" . $keyWord . "%")
            ->orderBy('id', 'asc')
            ->paginate($numPerPage);

        $count = Teacher::where('name', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'teachers' => $teachers,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('lookUp.teacher', $result);
    }

    /**
     * Look up student
     *
     * @param Request $request
     * @return response
     */
    public function student(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $name_key = is_null($request->input('name')) ? "" : $request->input('name');
        $class_key = is_null($request->input('class_id')) ? null : studentClass::find($request->input('class_id'));
        $numPerPage = is_null($request->input('numPerPage')) ? 20 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));

        $students = Student::where('name', 'like', "%" . $name_key . "%")
            ->orderBy('id', 'asc');
        if (!is_null($class_key)) {
            $students = $students->where("class", $class_key->id);
        }
        $count = $students->count();
        $students = $students->paginate($numPerPage);


        $result = [
            'students' => $students,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'name_key' => $name_key,
            'class_key' => $class_key,
            'totalCount' => $count
        ];

        return view('lookUp.student', $result);
    }

    /**
     * Look up power
     *
     * @param Request $request
     * @return response
     */
    public function power(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $keyWord = is_null($request->input('keywords')) ? "" : $request->input('keywords');
        $numPerPage = is_null($request->input('numPerPage')) ? 10 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));

        $powers = Power::where('name', 'like', "%" . $keyWord . "%")
            ->orderBy('id', 'asc')
            ->paginate($numPerPage);

        $count = Power::where('name', 'like', "%" . $keyWord . "%")
            ->count();

        $result = [
            'powers' => $powers,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('lookUp.power', $result);
    }

    /**
     * Look up power
     *
     * @param Request $request
     * @return response
     */
    public function studentClass(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $major_key = is_null($request->input('major')) ? null : Major::find($request->input('major'));
        $numPerPage = is_null($request->input('numPerPage')) ? 10 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));

        $classes = studentClass::orderBy('id', 'asc');
        $majors = Major::orderBy('id', 'asc');
        if (!is_null($major_key)) {
            $classes->where('major', $major_key->id);
            $majors->where('id', "!=", $major_key->id);
        }
        $count = $classes->count();
        $classes = $classes->paginate($numPerPage);
        $majors = $majors->get();


        $result = [
            'classes' => $classes,
            'majors' => $majors,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'major_key' => $major_key,
            'totalCount' => $count
        ];

        return view('lookUp.class', $result);
    }

    /**
     * Look up power
     *
     * @param Request $request
     * @return response
     */
    public function course(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $keyWord = is_null($request->input('keywords')) ? "" : $request->input('keywords');
        $numPerPage = is_null($request->input('numPerPage')) ? 10 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));

        $courses = Course::where('name', 'like', "%" . $keyWord . "%")
            ->orderBy('id', 'asc');
        $count = $courses->count();
        $courses = $courses->paginate($numPerPage);

        $result = [
            'courses' => $courses,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('lookUp.course', $result);
    }

    /**
     * Look up power
     *
     * @param Request $request
     * @return response
     */
    public function asset(Request $request)
    {
        $pageNum = is_null($request->input('pageNum')) ? 1 : (int)$request->input('pageNum');
        $keyWord = is_null($request->input('keywords')) ? "" : $request->input('keywords');
        $numPerPage = is_null($request->input('numPerPage')) ? 10 : $request->input('numPerPage');

        $request->merge(array('page' => $pageNum));

        $assets = Asset::where('name', 'like', "%" . $keyWord . "%")
            ->orderBy('id', 'asc');
        $count = $assets->count();
        $assets = $assets->paginate($numPerPage);

        $result = [
            'assets' => $assets,
            'numPerPage' => $numPerPage,
            'currentPage' => $pageNum,
            'keyWords' => $keyWord,
            'totalCount' => $count
        ];

        return view('lookUp.asset', $result);
    }
}
