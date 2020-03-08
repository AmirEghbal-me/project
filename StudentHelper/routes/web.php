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

Route::get('admin/logout','Admin\AdminController@logout')->name('admin.logout');
Route::get('/','Admin\AdminController@login')->name('admin.login');
Route::post('/','Admin\AdminController@dologin')->name('admin.post.login');

Route::get('user/logout','User\UserController@logout')->name('user.logout');
Route::get('/','User\UserController@login')->name('user.login');
Route::post('/','User\UserController@dologin')->name('user.post.login');
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'admin'],function (){
    Route::get('/dashboard','AdminController@adminDashboard')->name('adminDashboard');

    Route::get('/userRegister','user\UserController@userRegister')->name('user.register');
    Route::post('/userRegister','user\UserController@userDoRegister')->name('post.Register');
    Route::get('/userView','user\UserController@userView')->name('user.view');
    Route::get('/userDelete/{id}','user\UserController@delete')->name('user.delete');
    Route::get('/userEdit/{id}','user\UserController@edit')->name('user.edit');
    Route::post('/userEdit/{id}','user\UserController@update')->name('user.update');

    Route::get('/courseRegister','course\CourseController@create')->name('course.register');
    Route::post('/courseRegister','course\CourseController@present')->name('course.post.Register');
    Route::get('/courseView','course\CourseController@retrieve')->name('course.view');
    Route::get('/courseDelete/{course_code}','course\CourseController@delete')->name('course.delete');
    Route::get('/courseEdit/{course_code}','course\CourseController@edit')->name('course.edit');
    Route::post('/courseEdit/{course_code}','course\CourseController@update')->name('course.update');

    Route::get('/universityRegister','university\UniversityController@Add')->name('university.register');
    Route::post('/universityRegister','university\UniversityController@StoreData')->name('university.post.Register');
    Route::get('/universityView','university\UniversityController@retrieve')->name('university.view');
    Route::get('/universityDelete/{id}','university\UniversityController@delete')->name('university.delete');
    Route::get('/universityEdit/{id}','university\UniversityController@edit')->name('university.edit');
    Route::post('/universityEdit/{id}','university\UniversityController@update')->name('university.update');

    Route::get('/university/course/add/{university_id}','university\UniversityController@syncCourse')->name('uni.course.add');
    Route::post('/university/course/add/{university_id}','university\UniversityController@updateSyncCourse')->name('update.uni.course.add');

    Route::get('/courseUniRegister','courseUni\courseUniversityController@create')->name('courseUni.register');
    Route::post('/courseUniRegister','courseUni\courseUniversityController@store')->name('courseUni.post.Register');
    Route::get('/courseUniView','courseUni\courseUniversityController@retrieve')->name('courseUni.view');

    Route::get('/coursePresent','course\CoursePresentController@present')->name('coursePresent.register');
    Route::post('/coursePresent','course\CoursePresentController@store')->name('coursePresent.post.Register');
    Route::get('/coursePresent/delete/{id}','course\CoursePresentController@delete')->name('coursePresent.delete');

    Route::get('/course/present/{id}','course\CoursePresentController@present')->name('university.course.present');
    Route::get('/course/presented/view/{id}','course\CoursePresentController@retrieve')->name('university.course.view');
    Route::post('/course/present/{id}','course\CoursePresentController@store')->name('university.course.present.store');
});
Route::get('/coursePresentedView','Admin\course\CoursePresentController@retrieve')->name('coursePresentedView');

Route::group(['prefix'=>'user', 'namespace'=>'User', 'middleware'=>'user'],function (){
    Route::get('/dashboard','UserController@userDashboard')->name('userDashboard');

    Route::get('/selectUnit','selectUnit\SelectUnitController@check')->name('selectUnit');
    Route::get('/select','selectUnit\SelectUnitController@this')->name('select');
    Route::get('/selectUnit/{id}','selectUnit\SelectUnitController@doSelect')->name('post.selectUnit');
    Route::get('/Unit/delete/{id}','selectUnit\SelectUnitController@DeleteUnit')->name('delete.unit');
    Route::get('/course/weeks/time','selectUnit\SelectUnitController@courseWeeksTable')->name('course.weeks_time');
    Route::get('/selectUnitView','selectUnit\SelectUnitController@selectedCourseView')->name('selectUnitView');

    Route::get('/course/grades','TermResult@enterGrade')->name('enter.grades');
    Route::post('/course/grades','TermResult@doRegister');
});
