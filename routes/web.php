<?php

use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('php' , function () {
//    phpinfo();
//});


//Route::get('/test' , function() {
//    echo request()->fullUrl();
//    echo request()->fullUrlWithQuery(['type' => 'phone']);
//    echo request()->header('X-Header-Name','default');
//});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('posts/{post:slug}/{comment}', [PostCommentsController::class, 'subCommentView']);
Route::post('posts/{post:slug}/{comment}', [PostCommentsController::class, 'subCommentStore']);

Route::post('newsletter', [NewsletterController::class, 'newsletter']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('hosgeldin', [RegisterController::class, 'welcome'])->middleware('auth');
Route::patch('hosgeldin', [RegisterController::class, 'accept'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::get('forgotpass', [SessionsController::class, 'renewPassPage'])->middleware('guest');
Route::post('forgotpass', [SessionsController::class, 'renewPassLogic'])->middleware('guest');
Route::post('newpass/{user:username}', [SessionsController::class, 'newPass'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//Administration

Route::middleware('can:admin')->group(function () {
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}/update', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'delete']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'publishStatus']);

    Route::get('admin/comments', [AdminCommentController::class, 'list']);
    Route::get('admin/comments/create', [AdminCommentController::class, 'create']);
    Route::get('admin/posts/{post}/{comment}', [AdminCommentController::class, 'showCommentAdmin']);
    Route::get('admin/posts/{post}/{comment}/edit', [AdminCommentController::class, 'edit']);
    Route::patch('admin/posts/comment/{comment}/update', [AdminCommentController::class, 'update']);
    Route::delete('admin/posts/comment/{comment}', [AdminCommentController::class, 'delete']);
    Route::patch('admin/posts/comment/{comment}', [AdminCommentController::class, 'publishStatus']);

    Route::get('admin/userlist', [UserController::class, 'index']);
// Route::get('live-status/{id}', [UserController::class, 'liveStatus']); // json döndürecek
});

