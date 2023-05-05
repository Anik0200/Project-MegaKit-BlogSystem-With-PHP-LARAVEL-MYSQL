<?php

use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\TagController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CommentController;
use App\Http\Controllers\frontend\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//DEFAULT ROUTE S ===============================/

Auth::routes([
    'register' => false
]);

Route::get('/logout', function () {
    auth()->logout();
})->middleware('auth');

Route::view('/', 'auth.login');

//DEFAULT ROUTE E ===============================/


//BACKEND ROUTE S ===============================/

//DASHBOARD ROUTE S

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::view('/master', 'layouts.master')->middleware('auth');

//DASHBOARD ROUTE E


//CATEGORY ROUTE S

Route::resource('category', CategoryController::class)->middleware('auth');

Route::get('category/retrive/{id}', [CategoryController::class, 'retrive'])->name('category.retrive')->middleware('auth');

Route::get('category/permaDel/{id}', [CategoryController::class, 'permaDel'])->name('category.permaDel')->middleware('auth');

//CATEGORY ROUTE E


//CATEGORY ROUTE S

Route::resource('tag', TagController::class)->middleware('auth');

Route::get('tag/retrive/{id}', [TagController::class, 'retrive'])->name('tag.retrive')->middleware('auth');

Route::get('tag/permaDel/{id}', [TagController::class, 'permaDel'])->name('tag.permaDel')->middleware('auth');

//CATEGORY ROUTE E


//POST ROUTE S

Route::resource('post', PostController::class);

Route::get('post/retrive/{id}', [PostController::class, 'retrive'])->name('post.retrive')->middleware('auth');

Route::get('post/permaDel/{id}', [PostController::class, 'permaDel'])->name('post.permaDel')->middleware('auth');

//POST ROUTE E


//BACKEND ROUTE E ===============================/


//FRONTEND ROUTE S ===============================/

Route::get('frontend', [BlogController::class, 'index'])->name('frontend.index');

Route::get('frontend/show/{id}', [BlogController::class, 'show'])->name('frontend.show')->middleware('auth');;


// COMMENT ROUTE S

Route::post('post/comment/{postId}', [CommentController::class, 'postComment'])->name('post.comment')->middleware('auth');
Route::post('comment/reply/{commentId}', [CommentController::class, 'commentReply'])->name('comment.reply')->middleware('auth');
Route::delete('comment/delete/{commentId}', [CommentController::class, 'commentReplydelete'])->name('comment.delete')->middleware('auth');

// COMMENT ROUTE E

// TAG POST ROUTE E

Route::get('post/tag/{id}', [BlogController::class, 'tagsPost'])->name('post.tag')->middleware('auth');;

Route::post('postSerch', [BlogController::class, 'postSerch'])->name('postSerch')->middleware('auth');;

// TAG POST ROUTE E


//FRONTEND ROUTE E ===============================/
