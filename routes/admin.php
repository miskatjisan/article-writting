<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WithdrowController;


/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//auth
Route::get('/login',[AdminAuthController::class, 'login'])->middleware('adminLoggedIn');
Route::post('/check',[AdminAuthController::class, 'check'])->name('admin.check');
Route::get('/logout',[AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/',[AdminAuthController::class, 'dashboard'])->middleware('isLoggedInAdmin');

//Contact
Route::resource('contacts', ContactController::class);

//users
Route::resource('users', UserController::class);

//articles
Route::resource('articles', ArticleController::class);

//setting
Route::resource('settings', SettingController::class);

//Withdrow
Route::resource('withdrows', WithdrowController::class);