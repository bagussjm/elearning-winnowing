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
    return view('auth/login');
});
Route::get('/template', function () {
    return view('template/layout');
});

// Authentication Routes...
Auth::routes();
Route::get('/register','AuthController@getRegister')->name('register')->middleware('guest');
Route::post('/register','AuthController@postRegister')->middleware('guest');
Route::get('/forgot_password','AuthController@getForgotPassword')->name('forgot_password')->middleware('guest');

Route::get('/login','AuthController@getLogin')->name('login')->middleware('guest');
Route::post('/login','AuthController@postLogin')->middleware('guest');

Route::get('/logout','AuthController@logout')->middleware('auth')->name('logout');

Route::get('/vsmodel', 'VsController@proses');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('/profile', 'UserController@profile')->name('profile')->middleware('auth');
Route::post('/profile/upload','UserController@update_foto_profile')->middleware('auth');
Route::post('/profile/update','UserController@update_profile')->middleware('auth');


Route::get('/kelas', 'KelasController@index', function (){
    return view('kelas/index');} )->middleware('auth')->name('kelas');
Route::get('/kelas/{id}/delete', 'KelasController@delete')->name('kelas.delete')->middleware('auth');
Route::get('/kelas/{id}/delete_kelas_mhs', 'KelasController@delete_kelas_mhs')->name('kelas.delete-kelas-mhs')->middleware('auth');
Route::get('/kelas/{id}/view', 'KelasController@view')->middleware('auth')->name('kelas_view');
Route::post('/kelas/create','KelasController@create')->middleware('auth')->name('kelas_create');
Route::post('/kelas/ikuti','KelasController@ikuti')->middleware('auth')->name('kelas_ikuti');

Route::post('/question/create','QuestionController@create')->middleware('auth')->name('question_create');
Route::get('/question/{id}/delete', 'QuestionController@delete')->middleware('auth');
Route::any('/answer/create','AnswerController@create')->name('answer.create');
// VsController@proses
Route::get('/user', 'UserController@index')->name('user')->middleware('auth');
Route::get('/user/{id}/edit', 'UserController@edit')->middleware('auth');
Route::post('/user/{id}/update', 'UserController@update')->middleware('auth');
Route::get('/user/{id}/delete', 'UserController@delete')->middleware('auth');
Route::get('/winnowing', 'Winnowing@index');




