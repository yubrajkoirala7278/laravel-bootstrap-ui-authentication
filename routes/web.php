<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ===========frontend===========
Route::get('/', function () {
    return view('welcome');
});
Route::name('frontend.')->group(function(){
    require __DIR__.'/frontend.php';
});
// ==========end of frontend========


// =======auth===========
Auth::routes(); 
// =========end of auth========

// ========admin===============
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function(){
    require __DIR__.'/admin.php';
});
// =========end of auth=========
