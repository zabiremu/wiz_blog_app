<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Category\CategoryController;




Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard Controller
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    // Category Controller
    Route::controller(CategoryController::class)->prefix('/category')->name('category.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
    });
    // Post Controller
    Route::controller(PostController::class)->prefix('/posts')->name('posts.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
    });
});
