<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.landing');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/usuarios', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');

});
