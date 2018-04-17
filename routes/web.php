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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/contact', 'PagesController@contact');
Route::get('/student', 'PagesController@student');
Route::get('/company', 'PagesController@company');
// Route::get('/upload', 'PagesController@upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::POST('/company/register', 'CompanyController@register'); 
Route::get('/jobs', 'PagesController@jobs');
// Route::POST('/fetchskills','JobsController@fetchskill');

// Route::get('/fetchskills',function(){
//     return 'ajax is awesome';
// });

Route::get('/fetchskills','JobsController@fetchskills');
// Route::post('/fetchskills','JobsController@fetchskills');

Route::POST('/jobs', 'CompanyController@addjob')->name('job.submit');


//TODO: Group admin
// Route::prefix('admin')->group(function){}
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::POST('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

//TODO group company
// Route::prefix('company')->group(){}
Route::get('/company-dashboard','CompanyController@index')->name('company.dashboard');
Route::get('/company/login','Auth\CompanyLoginController@showLoginForm')->name('company.login');
Route::POST('/company/login', 'Auth\CompanyLoginController@login')->name('company.login.submit');
Route::get('/company/register', 'PagesController@company_register');

//Student Route
Route::get('/skills','StudentsController@index')->name('skills');
Route::POST('/skills','StudentsController@addSkills');
//upload
Route::get('/upload', 'UploadController@index');
Route::resource('upload', 'UploadController');
Route::get('/academics', 'UploadController@academics');
Route::get('/academics/marks', 'UploadController@marks');
Route::POST('/academics', 'UploadController@semester');
Route::POST('/academics/marks', 'UploadController@addmarks');
