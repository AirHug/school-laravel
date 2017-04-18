<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth;

class ManageController extends Controller
{

    /**
     * Index of teacher
     *
     * @param Request $request
     * @return response
     */
    public function teacherIndex(Request $request)
    {
        if ($request->query('do') == 'exit') Auth::guard("teachers")->Logout();
        return view('zzh.teacher.login');
    }

    /**
     * Login of teacher
     *
     * @param Request $request
     * @return response
     */
    public function teacherLogin(Request $request)
    {
        $rules = [
            'username' => 'required|max:50|min:4',
            'password' => 'required|max:20|min:5',
            'code' => 'required|captcha',
        ];
        $message = array(
            "username.required" => ":attribute 不能为空",
            "username.min" => ":attribute 不能小于4个字符",
            "username.max" => ":attribute 不能超过50个字符",
            "password.required" => ":attribute 不能为空",
            "password.min" => ":attribute 不能小于5个字符",
            "password.max" => ":attribute 不能超过20个字符",
            "code.captcha" => ":attribute 错误！",
            "code.required" => ":attribute 不能为空！",
        );
        $attributes = array(
            "code" => '验证码',
            "username" => '用户名',
            "password" => '密码'
        );
        $validator = Validator::make($request->all(), $rules, $message, $attributes);
        if ($validator->fails()) {
            return redirect('/hx')
                ->withErrors($validator)
                ->withInput();
        } else {
            if (Auth::guard('teachers')->attempt(['name' => $request->input("username"), 'password' => $request->input("password")])) {
                return redirect()->intended('/teacherAdmin');
            } else {
                return redirect('/hx')->with('login_errors', '用户名或密码不正确！');
            }
        }
    }

    /**
     * Index of student
     *
     * @param Request $request
     * @return response
     */
    public function studentIndex(Request $request)
    {
        if ($request->query('do') == 'exit') Auth::guard("students")->Logout();
        return view('zzh.student.login');
    }

    /**
     * Login of student
     *
     * @param Request $request
     * @return response
     */
    public function studentLogin(Request $request)
    {
        $rules = [
            'username' => 'required|max:50|min:4',
            'password' => 'required|max:20|min:5',
            'code' => 'required|captcha',
        ];
        $message = array(
            "username.required" => ":attribute 不能为空",
            "username.min" => ":attribute 不能小于4个字符",
            "username.max" => ":attribute 不能超过50个字符",
            "password.required" => ":attribute 不能为空",
            "password.min" => ":attribute 不能小于5个字符",
            "password.max" => ":attribute 不能超过20个字符",
            "code.captcha" => ":attribute 错误！",
            "code.required" => ":attribute 不能为空！",
        );
        $attributes = array(
            "code" => '验证码',
            "username" => '学号',
            "password" => '密码'
        );
        $validator = Validator::make($request->all(), $rules, $message, $attributes);

        if ($validator->fails()) {
            return redirect('/zzh')
                ->withErrors($validator)
                ->withInput();
            dd($validator);
        } else {
            if (Auth::guard('students')->attempt(['number' => $request->input("username"), 'password' => $request->input("password")])) {
                return redirect()->intended('/studentAdmin');
            } else {
                return redirect('/zzh')->with('login_errors', '用户名或密码不正确！');
            }
        }
    }
}
