<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// User Dashboard Controller
Route::controller(DashboardController::class)->prefix('users')->name('users.')->group(function () {
    Route::get('/dashboard', 'usersDashboard')->name('dashboard');
});
require __DIR__ . '/auth.php';
