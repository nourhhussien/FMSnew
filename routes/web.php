<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesAndPermissionController;
use App\Models\media;   
use Illuminate\Support\Facades\Auth;



Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
 Route::get('/features', [PagesController::class, 'features']);


 route::resource('posts', 'App\Http\Controllers\PostsController');

Route::get('/media', [MediaController::class, 'index'])->name('media.index') ;
Route::post('/media', [MediaController::class, 'store'])->name('media.store')  ;
Route::delete('/media/{id}', [MediaController::class, 'destroy'])->name('media.delete') ;
Route::get('/media/upload', [MediaController::class, 'create'])->name('media.upload') ;
Route::get('/media/{id}', [MediaController::class, 'show'])->name('media.show') ;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/profile/edit/{user_id}', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');
Route::get('/profile/password', [PasswordController::class, 'show'])->middleware('auth')->name('profile.password');
Route::post('/profile/password', [PasswordController::class,'update'])->middleware('auth')->name('profile.password.update');
// 
Route::get('/users/create', [UsersController::class, 'create'])->middleware('auth')->name('users.create');
Route::post('/users/store', [UsersController::class, 'store'])->middleware('auth')->name('users.store');
Route::get('/users', [UsersController::class, 'show'])->middleware('auth')->name('users.show');
 Route::get('profile/edit/{id}', [UsersController::class, 'edit'])->middleware('auth')->name('users.edit');
Route::put('/users/{id}', [UsersController::class, 'update'])->middleware('auth')->name('users.update');
Route::get('/users/{id}', [UsersController::class, 'destroy'])->middleware('auth')->name('users.destroy');

Route::post('/users/{id}/block', [UsersController::class, 'block'])->name('users.block');
Route::post('/users/{id}/unblock', [UsersController::class, 'unblock'])->name('users.unblock');

Route::get('/roles-and-permissions', [App\Http\Controllers\RolesAndPermissionController::class, 'addPermissons']);

Route::get('/RolesAndpermissions/show' , [App\Http\Controllers\RolesAndPermissionController::class, 'show'])->name('RolesAndpermissions.show');
Route::get('/RolesAndpermissions/create_roles' , [App\Http\Controllers\RolesAndPermissionController::class,'create_roles'])->name('RolesAndpermissions.create_roles');
Route::post('/RolesAndpermissions/create' , [App\Http\Controllers\RolesAndPermissionController::class,'create'])->name('RolesAndpermissions.create');
Route::get('/RolesAndpermissions/edit/{id}' , [App\Http\Controllers\RolesAndPermissionController::class,'edit'])->name('RolesAndpermissions.edit');
Route::put('/RolesAndpermissions/update/{id}' , [App\Http\Controllers\RolesAndPermissionController::class,'update'])->name('RolesAndpermissions.update');
Route::get('/RolesAndpermissions/{id}' , [App\Http\Controllers\RolesAndPermissionController::class,'destroy'])->name('RolesAndpermissions.delete');

   