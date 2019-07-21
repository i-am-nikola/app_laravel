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

// Route::get('admin', 'DashboardController@index')->name('admin.home.index');

Route::prefix('admin')->group(function () {
  Route::prefix('user')->group(function () {
    Route::get('add', 'UserController@getAdd')->name('admin.user.getAdd');
    Route::post('add', 'UserController@postAdd')->name('admin.user.postAdd');
    Route::get('list', 'UserController@list')->name('admin.user.list');
    Route::get('edit/{id}', 'UserController@getEdit')->name('admin.user.getEdit');
    Route::post('edit/{id}', 'UserController@postEdit')->name('admin.user.postEdit');
    Route::get('delete/{id}', 'UserController@delete')->name('admin.user.delete');
  });
});

Route::get('login', 'Auth\LoginController@getLogin')->name('login.getLogin');
Route::post('login', 'Auth\LoginController@postLogin')->name('login.postLogin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
  Route::get('home', 'DashboardController@index')->name('admin.home.index');
  Route::prefix('user')->group(function () {
    Route::get('add', 'UserController@getAdd')->name('admin.user.getAdd');
    Route::post('add', 'UserController@postAdd')->name('admin.user.postAdd');
    Route::get('list', 'UserController@list')->name('admin.user.list');
    Route::get('edit/{id}', 'UserController@getEdit')->name('admin.user.getEdit');
    Route::post('edit/{id}', 'UserController@postEdit')->name('admin.user.postEdit');
    Route::get('delete/{id}', 'UserController@delete')->name('admin.user.delete');
  });
});