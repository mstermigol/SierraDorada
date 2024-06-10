<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.landing');

Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {
        Route::prefix('usuarios')->group(function () {
            Route::get('/', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');
            Route::get('/crear', 'App\Http\Controllers\Admin\AdminUserController@create')->name('admin.user.create');
            Route::post('/guardar', 'App\Http\Controllers\Admin\AdminUserController@save')->name('admin.user.save');
            Route::delete('/eliminar/{id}', 'App\Http\Controllers\Admin\AdminUserController@delete')->name('admin.user.delete');
            Route::get('/editar/{id}', 'App\Http\Controllers\Admin\AdminUserController@edit')->name('admin.user.edit');
            Route::patch('/actualizar/{id}', 'App\Http\Controllers\Admin\AdminUserController@update')->name('admin.user.update');
        });

        Route::prefix('caballos')->group(function () {
            Route::get('/', 'App\Http\Controllers\Admin\AdminHorseController@index')->name('admin.horse.index');
            Route::get('/crear', 'App\Http\Controllers\Admin\AdminHorseController@create')->name('admin.horse.create');
            Route::post('/guardar', 'App\Http\Controllers\Admin\AdminHorseController@save')->name('admin.horse.save');
            Route::delete('/eliminar/{id}', 'App\Http\Controllers\Admin\AdminHorseController@delete')->name('admin.horse.delete');
            Route::get('/editar/{id}', 'App\Http\Controllers\Admin\AdminHorseController@edit')->name('admin.horse.edit');
            Route::patch('/actualizar/{id}', 'App\Http\Controllers\Admin\AdminHorseController@update')->name('admin.horse.update');
            Route::get('/{id}', 'App\Http\Controllers\Admin\AdminHorseController@show')->name('admin.horse.show');
        });
    });

Route::fallback(function () {
    return redirect()->route('home.landing');
});
