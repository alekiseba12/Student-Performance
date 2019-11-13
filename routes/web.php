<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome2');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['role:superadministrator']], function() {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');
Route::get('/administrator', 'AdministratorController@index');
Route::post('teacherprofile', 'AdministratorController@addprofile')->name('teacherprofile');
Route::get('viewteacherprofiles', 'AdministratorController@viewteacher')->name('viewteacherprofiles');
Route::get('teachersubjects', 'AdministratorController@getsubject')->name('teachersubjects');\
Route::post('storeteachersubject', 'AdministratorController@storeteachersubjects')->name('storeteachersubjects');
Route::get('viewsubjects', 'AdministratorController@subjects')->name('viewsubjects');
Route::get('studentExamsForm', 'AdministratorController@performanceForm')->name('studentExamsForm');
Route::post('insertstudentExams', 'AdministratorController@studentperformance')->name('insertstudentExams');
Route::get('studentresults', 'AdministratorController@getresults')->name('studentresults');
Route::get('studentresults/{exam_code}','AdministratorController@viewExam');
Route::get('teacherExam', 'AdministratorController@viewresults')->name('teacherExam');
Route::get('teacherSubjects', 'AdministratorController@viewsubjects')->name('teacherSubjects');
Route::get('teacherProfile', 'AdministratorController@getprofile')->name('teacherProfile');
Route::get('allstudents', 'AdminController@allstudents')->name('allstudents');
Route::get('/user', 'UserController@index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('performanceGraph', 'UserController@performance')->name('performanceGraph');
Route::get('subjectEvaluation', 'UserController@subjects')->name('subjectEvaluation');
Route::get('studentperformance', 'AdminController@performance')->name('studentperformance');
Route::get('studentdashboard', 'AdminController@student')->name('studentdashboard');
Route::get('studentperformanceForm', 'AdminController@performanceForm')->name('studentperformanceForm');
Route::get('studentsubjects', 'AdminController@subjects')->name('studentsubjects');
Route::post('insertstudentdetails', 'AdminController@storestudent')->name('insertstudentdetails');
Route::get('studentoverallperformance', 'AdminController@overal')->name('studentoverallperformance');
Route::post('insertstudentsubjects', 'AdminController@storestudentsubjects')->name('insertstudentsubjects');
Route::post('insertstudentperformance', 'AdminController@studentperformance')->name('insertstudentperformance');
Route::get('getstudentdetails/{admin_no}', 'AdminController@editstudentdetail')->name('getstudentdetails/{admin_no}');
Route::post('updatestudentdetails/{admin_no}', 'AdminController@updatestudent');
Route::get('deletestudentdetails/{admin_no}', 'AdminController@deletestudent');
Route::get('getperformanceForm/{id}', 'AdminController@getperformanceForm');
Route::post('updateperformanceDetails/{id}', 'AdminController@updateperformance');
Route::get('deleteperfomancedetails/{id}', 'AdminController@deleteperformance');
Route::get('viewstudentsubjectsdetails', 'AdminController@viewstudentsubjects')->name('viewstudentsubjectsdetails');
Route::get('getstudentsubjectsdetails/{id}', 'AdminController@getstudentsubjectsdetails');
Route::post('updatestudentsubjectsdetails/{id}', 'AdminController@updatestudentsubjects');
Route::get('deletestudentsubjectsdetails/{id}', 'AdminController@deletestudentsubject');
Route::get('getformonestudents', 'AdminController@getformone')->name('getformonestudents');
Route::get('getformtwostudents', 'AdminController@getformtwo')->name('getformtwostudents');
Route::get('getformthreestudents', 'AdminController@getformthree')->name('getformthreestudents');
Route::get('getformfourstudents', 'AdminController@getformfour')->name('getformfourstudents');
Route::get('getstreamperformance', 'AdminController@streamsPerformance')->name('getstreamperformance');
Route::get('getsubjectperformance', 'AdminController@subjectperformance')->name('getsubjectperformance');
Route::get('studentdata', 'UserController@parentgetstudent')->name('studentdata');
Route::get('parentprofile', 'UserController@profile')->name('parentprofile');
Route::post('parentdetails', 'UserController@addprofile')->name('parentdetails');
Route::get('parentstudentperormance', 'UserController@studentresult')->name('parentstudentperormance');
Route::get('studentsubjectperformance/{exam_code}', 'UserController@studentsubjectperformance')->name('studentsubjectperformance/{exam_code}');
Route::get('examForm', 'AdminController@getexamsForm')->name('examForm');
Route::post('examdetails', 'AdminController@storeexams')->name('examdetails');
Route::get('viewexaminations', 'AdminController@exams')->name('viewexaminations');
Route::get('editexaminations/{exam_code}', 'AdminController@editexams');
Route::post('updateexam/{exam_code}', 'AdminController@updateexam');
Route::get('deleteexamdetails/{exam_code}', 'AdminController@deleteexam');
Route::get('barcode', 'UserController@getbarcode');
Route::get('parentstudentsubjects', 'UserController@getstudentsubjects')->name('parentstudentsubjects');
Route::get('teachersdetails', 'UserController@getteachers')->name('teachersdetails');
Route::get('streamperformance', 'UserController@streamPerformance')->name('streamperformance');

