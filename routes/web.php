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

        Route::prefix('profesores')->group(function () {
            Route::get('/', 'App\Http\Controllers\Admin\AdminTeacherController@index')->name('admin.teacher.index');
            Route::get('/crear', 'App\Http\Controllers\Admin\AdminTeacherController@create')->name('admin.teacher.create');
            Route::post('/guardar', 'App\Http\Controllers\Admin\AdminTeacherController@save')->name('admin.teacher.save');
            Route::delete('/eliminar/{id}', 'App\Http\Controllers\Admin\AdminTeacherController@delete')->name('admin.teacher.delete');
            Route::get('/editar/{id}', 'App\Http\Controllers\Admin\AdminTeacherController@edit')->name('admin.teacher.edit');
            Route::patch('/actualizar/{id}', 'App\Http\Controllers\Admin\AdminTeacherController@update')->name('admin.teacher.update');
            Route::get('/{id}', 'App\Http\Controllers\Admin\AdminTeacherController@show')->name('admin.teacher.show');
        });

        Route::prefix('testimonios')->group(function () {
            Route::get('/', 'App\Http\Controllers\Admin\AdminTestimonyController@index')->name('admin.testimony.index');
            Route::get('/crear', 'App\Http\Controllers\Admin\AdminTestimonyController@create')->name('admin.testimony.create');
            Route::post('/guardar', 'App\Http\Controllers\Admin\AdminTestimonyController@save')->name('admin.testimony.save');
            Route::delete('/eliminar/{id}', 'App\Http\Controllers\Admin\AdminTestimonyController@delete')->name('admin.testimony.delete');
            Route::get('/editar/{id}', 'App\Http\Controllers\Admin\AdminTestimonyController@edit')->name('admin.testimony.edit');
            Route::patch('/actualizar/{id}', 'App\Http\Controllers\Admin\AdminTestimonyController@update')->name('admin.testimony.update');
            Route::get('/{id}', 'App\Http\Controllers\Admin\AdminTestimonyController@show')->name('admin.testimony.show');
        });

        Route::prefix('galerias')->group(function () {
            Route::get('/', 'App\Http\Controllers\Admin\AdminGalleryController@index')->name('admin.gallery.index');
            Route::get('/crear', 'App\Http\Controllers\Admin\AdminGalleryController@create')->name('admin.gallery.create');
            Route::post('/guardar', 'App\Http\Controllers\Admin\AdminGalleryController@save')->name('admin.gallery.save');
            Route::delete('/eliminar/{id}', 'App\Http\Controllers\Admin\AdminGalleryController@delete')->name('admin.gallery.delete');
            Route::get('/editar/{id}', 'App\Http\Controllers\Admin\AdminGalleryController@edit')->name('admin.gallery.edit');
            Route::patch('/actualizar/{id}', 'App\Http\Controllers\Admin\AdminGalleryController@update')->name('admin.gallery.update');
            Route::get('/{id}', 'App\Http\Controllers\Admin\AdminGalleryController@show')->name('admin.gallery.show');
        });

        Route::prefix('eventos')->group(function () {
            Route::get('/', 'App\Http\Controllers\Admin\AdminEventController@index')->name('admin.event.index');
            Route::get('/crear', 'App\Http\Controllers\Admin\AdminEventController@create')->name('admin.event.create');
            Route::post('/guardar', 'App\Http\Controllers\Admin\AdminEventController@save')->name('admin.event.save');
            Route::delete('/eliminar/{id}', 'App\Http\Controllers\Admin\AdminEventController@delete')->name('admin.event.delete');
            Route::get('/editar/{id}', 'App\Http\Controllers\Admin\AdminEventController@edit')->name('admin.event.edit');
            Route::patch('/actualizar/{id}', 'App\Http\Controllers\Admin\AdminEventController@update')->name('admin.event.update');
            Route::get('/{id}', 'App\Http\Controllers\Admin\AdminEventController@show')->name('admin.event.show');
        });

        Route::prefix('servicios')->group(function () {
            Route::get('/', 'App\Http\Controllers\Admin\AdminServiceController@index')->name('admin.service.index');
            Route::get('/crear', 'App\Http\Controllers\Admin\AdminServiceController@create')->name('admin.service.create');
            Route::post('/guardar', 'App\Http\Controllers\Admin\AdminServiceController@save')->name('admin.service.save');
            Route::delete('/eliminar/{id}', 'App\Http\Controllers\Admin\AdminServiceController@delete')->name('admin.service.delete');
            Route::get('/editar/{id}', 'App\Http\Controllers\Admin\AdminServiceController@edit')->name('admin.service.edit');
            Route::patch('/actualizar/{id}', 'App\Http\Controllers\Admin\AdminServiceController@update')->name('admin.service.update');
            Route::get('/{id}', 'App\Http\Controllers\Admin\AdminServiceController@show')->name('admin.service.show');
        });

        Route::prefix('deportista')->group(function () {
            Route::get('/', 'App\Http\Controllers\Admin\AdminSportsmanController@index')->name('admin.sportsman.index');
            Route::get('/crear', 'App\Http\Controllers\Admin\AdminSportsmanController@create')->name('admin.sportsman.create');
            Route::post('/guardar', 'App\Http\Controllers\Admin\AdminSportsmanController@save')->name('admin.sportsman.save');
            Route::delete('/eliminar/{id}', 'App\Http\Controllers\Admin\AdminSportsmanController@delete')->name('admin.sportsman.delete');
            Route::get('/editar/{id}', 'App\Http\Controllers\Admin\AdminSportsmanController@edit')->name('admin.sportsman.edit');
            Route::patch('/actualizar/{id}', 'App\Http\Controllers\Admin\AdminSportsmanController@update')->name('admin.sportsman.update');
            Route::get('/{id}', 'App\Http\Controllers\Admin\AdminSportsmanController@show')->name('admin.sportsman.show');
        });
    });

Route::prefix('servicios')->group(function () {
    Route::get('/', 'App\Http\Controllers\ServiceController@index')->name('home.service.index');
    Route::get('/{id}', 'App\Http\Controllers\ServiceController@show')->name('home.service.show');
});

Route::prefix('eventos')->group(function () {
    Route::get('/', 'App\Http\Controllers\EventController@index')->name('home.event.index');
    Route::get('/{id}', 'App\Http\Controllers\EventController@show')->name('home.event.show');
});

Route::prefix('galerias')->group(function () {
    Route::get('/', 'App\Http\Controllers\GalleryController@index')->name('home.gallery.index');
    Route::get('/{id}', 'App\Http\Controllers\GalleryController@show')->name('home.gallery.show');
});

Route::get('/caballos', 'App\Http\Controllers\HorseController@index')->name('home.horse.index');

Route::get('/nosotros', 'App\Http\Controllers\AboutController@index')->name('home.about.index');

Route::fallback(function () {
    return redirect()->route('home.landing');
});
