<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::post('newsletter', NewsletterController::class);

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::middleware('guest')->group(static function() {
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [SessionsController::class, 'create']);
    Route::post('login', [SessionsController::class, 'store']);
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin
Route::middleware('can:admin')->group(static function() {
    Route::get('admin/posts', [AdminPostController::class, 'index'])->name('manage_posts');
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('create_new_post');
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('edit_post');
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
    // or
    // Route::resource('admin/posts', AdminPostController::class)->except('show');
});
