<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

Route::post('/subscribe', function () {
    $email = request('email');

    // Example subscription logic
    NewsLetter::subscribe($email);

   return redirect()->back()->with('success', 'You have subscribed successfully!');

});




Route::get("/test", function () {
    return App\Models\Profile::find(1)->user;
});


Route::get('/', [FrontEndController::class, 'index'])->name('home');

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



    Route::get('/tags', [TagsController::class, 'index'])->name('tags');
    Route::get('/tag/create', [TagsController::class, 'create'])->name('tag.create');
    Route::post('/tag/store', [TagsController::class, 'store'])->name('tag.store');
    Route::get('/tag/edit/{id}', [TagsController::class, 'edit'])->name('tag.edit');
    Route::post('/tag/update/{id}', [TagsController::class, 'update'])->name('tag.update');
    Route::get('/tag/delete/{id}', [TagsController::class, 'destroy'])->name('tag.delete');



    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
    Route::get('/user/admin/{id}', [UsersController::class, 'admin'])->name('user.admin')->middleware('admin');
    Route::get('/user/not_admin/{id}', [UsersController::class, 'not_admin'])->name('user.not_admin');
    Route::get('/user/delete/{id}', [UsersController::class, 'destroy'])->name('user.delete');



    Route::get('/user/profile', [ProfilesController::class, 'index'])->name('user.profile');
    Route::post('/user/profile/update', [ProfilesController::class, 'update'])->name('user.profile.update');





    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/settings', [SettingsController::class, 'index'])->name('settings');
        Route::post('/admin/settings/update', [SettingsController::class, 'update'])->name('settings.update');
    });








});

Route::get('/post/{slug}', [FrontEndController::class, 'singlePost'])->name('post.single');
Route::get('/category/{id}', [FrontEndController::class, 'category'])->name('category.single');
Route::get('/tag/{id}', [FrontEndController::class, 'tag'])->name('tag.single');

Route::get('/results', function(){

    $posts= \App\Models\Post::where('title', 'like','%' .request('query'). '%')->get();

    return view('results')->with('posts', $posts)
                          ->with('title', 'Search result:'. request('query'))
                          ->with('settings', \App\Models\Setting::first())
                          ->with('categories', \App\Models\Category::take(4)->get())
                          ->with('query', request('query'));
});


