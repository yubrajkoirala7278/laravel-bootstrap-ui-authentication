<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');




Route::resources([
    'permissions'=>PermissionController::class,
    'roles'=>RoleController::class,
]);

Route::get('/roles/{roleId}/give-permissions',[RoleController::class,'addPermissionToRole'])->name('add.permissions.to.role');
Route::put('/roles/{roleId}/give-permissions',[RoleController::class,'givePermissionToRole'])->name('give.permissions.to.role');