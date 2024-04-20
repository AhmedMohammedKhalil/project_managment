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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/book', 'HomeController@showProject')->name('show-project');
Route::get('/search', 'HomeController@search')->name('search');

Route::middleware(['guest:user'])->group(function () {
    Route::get('/user/login', 'userController@showLoginForm')->name('user.login');
    Route::get('/user/register', 'userController@showRegisterForm')->name('user.register');

});


Route::middleware(['auth:user'])->name('user.')->prefix('user')->group(function () {
    Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/settings', 'UserController@settings')->name('settings');
    Route::get('/changePassword', 'UserController@changePassword')->name('changePassword');
    Route::get('/logout', 'UserController@logout')->name('logout');


    Route::prefix('/project')->name('project.')->group(function () {
        Route::get('/index', 'ProjectController@index')->name('index');
        Route::get('/create', 'ProjectController@create')->name('create');
        Route::get('/show', 'ProjectController@show')->name('show');
        Route::get('/edit', 'ProjectController@edit')->name('edit');
        Route::delete('/delete', 'ProjectController@delete')->name('delete');
    });

});

