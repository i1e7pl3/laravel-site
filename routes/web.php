<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\PageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
=======
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController;
>>>>>>> d2046f5 (7 practice)

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/gallery/{id}', [MainController::class, 'gallery'])->name('gallery');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

Route::get('/signin', [AuthController::class, 'create'])->name('signin.form');
Route::post('/signin', [AuthController::class, 'registration'])->name('signin');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('articles', ArticleController::class);
<<<<<<< HEAD
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::resource('articles', ArticleController::class)->except(['create']);
=======
    Route::post('articles/{article}/comments', [CommentController::class, 'store'])
        ->name('articles.comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
>>>>>>> d2046f5 (7 practice)
