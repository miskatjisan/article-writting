<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
// use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WithdrowController;


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', [UserAuthController::class, 'login'])->name('login');
Route::post('post-login', [UserAuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [UserAuthController::class, 'registration'])->name('register');
Route::post('post-registration', [UserAuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('', [UserAuthController::class, 'index']); 
Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');

//Contact
// Route::get('contact/us',  [ContactController::class,'Create'] )->name('contact.create'); 
// Route::post('contact/add/successfull',  [ContactController::class,'Store'] )->name('contact.store');

//Update Profile
Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update/successfully', [UserProfileController::class, 'update'])->name('profile.update');

//articles
Route::get('writer/articles', [ArticleController::class, 'WriterArticle'])->name('writer.articles');
Route::get('/article/create', [ArticleController::class, 'Create'])->name('create.article');
Route::post('/article/save/successfully', [ArticleController::class, 'save'])->name('save.article');
Route::get('/article/edit/{article}', [ArticleController::class, 'Edit'])->name('edit.article');
Route::post('/article/updated/successfully/{article}', [ArticleController::class, 'Update'])->name('update.article');
Route::post('/article/delete/successfully/{article}', [ArticleController::class, 'delete'])->name('delete.article');

Route::get('/articles', [ArticleController::class, 'display'])->name('articles');

// withdrow

Route::get('/withdrow', [WithdrowController::class, 'MakeWriterWithdrow'])->name('withdrow');
Route::post('/withdrow/request/send/successfully', [WithdrowController::class, 'SaveWithdrow'])->name('withdrow.make');