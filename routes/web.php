<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('permissions' , [PermissionController::class]);

Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.delete');



Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::get('roles/{rolesId}/delete', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.delete');
Route::get('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class, 'givePermissionToRole']);


Route::resource('users', App\Http\Controllers\UserController::class);
