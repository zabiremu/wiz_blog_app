<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/','home')->name('home');
    Route::get('/show/blog/{id}','show')->name('view.blog');
});
require __DIR__ . '/auth.php';
