<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ===========frontend===========
Route::name('frontend.')->group(function () {
    require __DIR__ . '/frontend.php';
});
// ==========end of frontend========


// =======auth=================
Auth::routes();
// =========end of auth========

// ========admin===============
Route::middleware(['auth.admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        require __DIR__ . '/admin.php';
    });
});
// =========end of auth=========
