<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::resources([
    // 'blogs'=>BlogController::class,
]);

Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');