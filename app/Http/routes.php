<?php
use App\Teacher;
use App\Http\Requests\Request;
use App\Config as TestConfig;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/extension', function () {
    dd(get_loaded_extensions());
});

Route::get('/vue', function () {
    return view('vue');
});
Route::get('/hehe', function () {
    $config = new TestConfig();
    $config->key = 1;
    $config->value = "123";
    $config->save();
    return "success";
});
Route::get('/test', function () {
    $banners = \App\Banner::all();
    return $banners;
//    $results = Excel::load("123.xls", function ($reader) {
//    })->get();
//    \Maatwebsite\Excel\Facades\Excel::create('123', function($excel) {
//
//        $excel->sheet('Sheet1', function($sheet) {
//            $sheet->row(1, array(
//                'test1', 'test2'
//            ));
//            $sheet->row(2, array(
//                'test3', 'test4'
//            ));
//        });
//    })->store('xls','files/')->export('xls');
});
Route::post('/test', 'SiteController@create');
Route::delete('/test/{id}', 'SiteController@delete');

Route::get('/air/hug/zzh', function () {
    $teacher = new Teacher();
    $teacher->name = "zzh635";
    $teacher->password = bcrypt("123456");
    $teacher->group = 1;
    $teacher->save();
    return "Welcome my master!";
});

//微信接口路由
Route::any('/wechat', 'WechatController@serve');

//网站页面
Route::get('', 'SiteController@index');
Route::get('N', 'SiteController@noticesList');
Route::get('N/{id}', 'SiteController@notice');
Route::get('L/{id}', 'SiteController@articlesList');
Route::get('A/{id}', 'SiteController@article');
Route::get('jwc', 'SiteController@jwc');
Route::get('jng', 'SiteController@jng');

//登录页面
Route::get('/hx', 'ManageController@teacherIndex');
Route::post('/hx', 'ManageController@teacherLogin');
Route::get('/zzh', 'ManageController@studentIndex');
Route::post('/zzh', 'ManageController@studentLogin');

//Look up
Route::match(['get', 'post'], '/look/article', 'LookUpController@article');
Route::match(['get', 'post'], '/look/major', 'LookUpController@major');
Route::match(['get', 'post'], '/look/teacher', 'LookUpController@teacher');
Route::match(['get', 'post'], '/look/student', 'LookUpController@student');
Route::match(['get', 'post'], '/look/power', 'LookUpController@power');
Route::match(['get', 'post'], '/look/class', 'LookUpController@studentClass');
Route::match(['get', 'post'], '/look/course', 'LookUpController@course');
Route::match(['get', 'post'], '/look/asset', 'LookUpController@asset');

Route::group(['middleware' => 'auth:students'], function () {

    //Main
    Route::get('/studentAdmin', function () {
        return view('admin.student');
    });

    //Course
    Route::match(['get', 'post'], '/course/student', 'CourseController@student');
    Route::post('/course/select', "CourseController@select");

});

Route::group(['middleware' => 'auth:teachers'], function () {

    //Main
    Route::get('/teacherAdmin', function () {
        return view('admin.teacher');
    });

    Route::post('/upload', 'UploadController@upload');

    //Advertisement
    Route::match(['get', 'post'], '/advertisement/view', 'AdvertisementController@show');
    Route::get('/advertisement/add', "AdvertisementController@add");
    Route::get('/advertisement/edit', "AdvertisementController@edit");
    Route::post('/advertisement/delete', "AdvertisementController@delete");
    Route::post('/advertisement', 'AdvertisementController@data');

    //Banner
    Route::match(['get', 'post'], '/banner/view', 'BannerController@show');
    Route::get('/banner/add', "BannerController@add");
    Route::get('/banner/edit', "BannerController@edit");
    Route::post('/banner/delete', "BannerController@delete");
    Route::post('/banner', 'BannerController@data');

    //Link
    Route::match(['get', 'post'], '/link/view', 'LinkController@show');
    Route::get('/link/add', "LinkController@add");
    Route::get('/link/edit', "LinkController@edit");
    Route::post('/link/delete', "LinkController@delete");
    Route::post('/link', 'LinkController@data');

    //Catalog
    Route::match(['get', 'post'], '/catalog/view', 'CatalogController@show');
    Route::get('/catalog/add', "CatalogController@add");
    Route::get('/catalog/edit', "CatalogController@edit");
    Route::post('/catalog/delete', "CatalogController@delete");
    Route::post('/catalog', 'CatalogController@data');

    //Article
    Route::match(['get', 'post'], '/article/view', 'ArticleController@show');
    Route::get('/article/add', "ArticleController@add");
    Route::get('/article/edit', "ArticleController@edit");
    Route::post('/article/delete', "ArticleController@delete");
    Route::post('/article/pass', "ArticleController@pass");
    Route::post('/article', 'ArticleController@data');

    //Notice
    Route::match(['get', 'post'], '/notice/view', 'NoticeController@show');
    Route::get('/notice/add', "NoticeController@add");
    Route::get('/notice/edit', "NoticeController@edit");
    Route::post('/notice/delete', "NoticeController@delete");
    Route::post('/notice/pass', "NoticeController@pass");
    Route::post('/notice', 'NoticeController@data');

    //Resource
    Route::match(['get', 'post'], '/resource/view', 'ResourceController@show');
    Route::get('/resource/add', "ResourceController@add");
    Route::get('/resource/edit', "ResourceController@edit");
    Route::post('/resource/delete', "ResourceController@delete");
    Route::post('/resource/pass', "ResourceController@pass");
    Route::post('/resource', 'ResourceController@data');

    //Major
    Route::match(['get', 'post'], '/major/view', 'MajorController@show');
    Route::get('/major/add', "MajorController@add");
    Route::get('/major/edit', "MajorController@edit");
    Route::post('/major/delete', "MajorController@delete");
    Route::post('/major', 'MajorController@data');

    //Class
    Route::match(['get', 'post'], '/class/view', 'ClassController@show');
    Route::get('/class/add', "ClassController@add");
    Route::get('/class/edit', "ClassController@edit");
    Route::post('/class/delete', "ClassController@delete");
    Route::post('/class', 'ClassController@data');

    //Student
    Route::match(['get', 'post'], '/student/view', 'StudentController@show');
    Route::get('/student/add', "StudentController@add");
    Route::get('/student/excelAdd', "StudentController@excelAdd");
    Route::get('/student/edit', "StudentController@edit");
    Route::post('/student/delete', "StudentController@delete");
    Route::post('/student', 'StudentController@data');

    //Power
    Route::match(['get', 'post'], '/power/view', 'PowerController@show');
    Route::get('/power/add', "PowerController@add");
    Route::get('/power/edit', "PowerController@edit");
    Route::get('/power/info', "PowerController@info");
    Route::post('/power/delete', "PowerController@delete");
    Route::post('/power', 'PowerController@data');

    //Teacher
    Route::match(['get', 'post'], '/teacher/view', 'TeacherController@show');
    Route::get('/teacher/add', "TeacherController@add");
    Route::get('/teacher/edit', "TeacherController@edit");
    Route::post('/teacher/delete', "TeacherController@delete");
    Route::post('/teacher', 'TeacherController@data');

    //Course
    Route::match(['get', 'post'], '/course/view', 'CourseController@show');
    Route::get('/course/add', "CourseController@add");
    Route::get('/course/edit', "CourseController@edit");
    Route::post('/course/delete', "CourseController@delete");
    Route::post('/course/pass', "CourseController@pass");
    Route::post('/course/operate', "CourseController@operate");
    Route::post('/course', 'CourseController@data');

    //CourseLog
    Route::match(['get', 'post'], '/courseLog/view', 'CourseLogController@show');
    Route::get('/courseLog/excel', "CourseLogController@excel");

    //Leave Note
    Route::match(['get', 'post'], '/leaveNote/student', 'LeaveNoteController@student');
    Route::match(['get', 'post'], '/leaveNote/teacher', 'LeaveNoteController@teacher');
    Route::get('/leaveNote/add/{type}', "LeaveNoteController@add");
    Route::get('/leaveNote/edit/{type}', "LeaveNoteController@edit");
    Route::post('/leaveNote/pass', "LeaveNoteController@pass");
    Route::post('/leaveNote/delete', "LeaveNoteController@delete");
    Route::post('/leaveNote', 'LeaveNoteController@data');

    //Asset
    Route::match(['get', 'post'], '/asset/view', 'AssetController@show');
    Route::get('/asset/add', "AssetController@add");
    Route::get('/asset/edit', "AssetController@edit");
    Route::post('/asset/delete', "AssetController@delete");
    Route::post('/asset', 'AssetController@data');

    //Application
    Route::match(['get', 'post'], '/application/view', 'ApplicationController@show');
    Route::get('/application/add', "ApplicationController@add");
    Route::get('/application/info', "ApplicationController@info");
    Route::post('/application/delete', "ApplicationController@delete");
    Route::post('/application/pass', "ApplicationController@pass");
    Route::post('/application/execute', "ApplicationController@execute");
    Route::post('/application', 'ApplicationController@data');
});
