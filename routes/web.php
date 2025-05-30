<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();





Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
    Route::get('/posts/kill/{id}', [PostController::class, 'kill'])->name('posts.kill');
    Route::get('/posts/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update');





    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
});

