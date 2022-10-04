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

Route::view('/', 'welcome');
Route::get('/issues', 'IssueController@index');
Route::get('/db', 'IssueController@db');

Route::get('/posts', 'PostController@index');
Route::get('/categories', 'CategoryController@index');

Route::view('/validate', 'validate');
Route::post('/validate', 'IssueController@validateData')->name('issue.validate');

Route::get('/page-request', 'PageController@request')->name('page.request');

Route::view('/login', 'auth.login')->name('auth.form');
Route::post('/login', 'AuthController@login')->name('auth.login');

Route::view('/login-admin', 'auth.admin_login')->name('auth_admin.form');
Route::post('/login-admin', 'AuthAdminController@login')->name('auth_admin.login');

Route::get('/page-member', 'PageController@forMember')->name('page.member');

Route::resource('users', 'UserController');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', 'AuthController@login')->name('auth.logout');
});

////////////////////// ADMIN GAURD //////////////////////
Route::group(['middleware' => ['auth:admin']], function () {
    Route::post('/logout', 'AuthAdminController@logout')->name('auth_admin.logout');

    Route::get('/page-admin', 'PageController@forAdmin')->name('page.admin');
});