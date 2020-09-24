<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Authentcation

//register
Route::get('register', 'AuthController@register')->name('auth.register');
Route::post('handle-register', 'AuthController@handleRegister')->name('auth.handleRegister');

//login
Route::get('login', 'AuthController@login')->name('auth.login');
Route::post('handle-login', 'AuthController@handleLogin')->name('auth.handleLogin');


//Logout
Route::get('/logout', 'AuthController@logout')->name('auth.logout');


//Routes for Students
Route::resource('students', 'StudentController')->except(['update', 'show']);
Route::post('/students/update/{id}', 'StudentController@update')->name('students.update');
Route::get('/students/apply/{id}', 'StudentController@apply')->name('students.apply');
Route::post('/students/sent/{id}', 'StudentController@sent')->name('students.sent');
//--------------------------------------------------------------------------------------------
// Route::get('/students/apply/{id}', 'JopStudentController@apply')->name('students.apply');
// Route::post('/students/sent/{id}', 'JopStudentController@sent')->name('students.sent');
//------------------------------------------------------------------------------------------


//Routes for company
Route::resource('companies', 'CompanyController')->except(['update', 'show', 'destroy']);
Route::post('/companies/update/{id}', 'CompanyController@update')->name('companies.update');
Route::get('/companies/approve/{id}', 'CompanyController@approve')->name('companies.approve');
Route::get('/companies/show/{id}', 'CompanyController@show')->name('companies.show');
Route::get('/jops/destroy/{id}', 'CompanyController@destroy')->name('companies.destroy');


//Routes for resumes
Route::get('/resumes/create', 'ResumeController@create')->name('resumes.create');
Route::post('/resumes/store', 'ResumeController@store')->name('resumes.store');
Route::get('/students/resumes', 'ResumeController@index')->name('students.resumes');
Route::get('/resumes/delete/{id}', 'ResumeController@delete')->name('resumes.delete');


//Routes for companies
Route::get('/jops/create', 'JopController@create')->name('jops.create');
Route::post('/jops/store', 'JopController@store')->name('jops.store');
Route::get('/companies/jops', 'JopController@index')->name('companies.jops');
Route::get('/jops/delete/{id}', 'JopController@delete')->name('jops.delete');
