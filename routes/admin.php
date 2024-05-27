<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

Route::resources([
    'permissions' => PermissionController::class,
    'roles' => RoleController::class,
]);

// roles and permission:
Route::group(['middleware' => ['auth.admin']], function () {
    /* super_admin and admin can only access user controller.*/
    Route::resources([
        'users' => UserController::class
    ]);

    // super_admin and admin with permission "add project" can only access this routes
    // Route::get('/store/project', [UserController::class, 'storeProject'])->name('store.project')
    // ->middleware('permission:add project');

});
Route::get('/roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('add.permissions.to.role');
Route::put('/roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('give.permissions.to.role');