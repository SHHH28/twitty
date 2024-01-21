<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Models\Idea;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('terms', [DashboardController::class, 'terms'])->name('terms');
Route::get('feeds', FeedController::class)->middleware(['auth'])->name('feeds');
Route::get('profile', [UserController::class, 'profile'])->middleware(['auth'])->name('profile');

Route::resource('ideas', IdeaController::class)->only(['show']);
Route::resource('ideas', IdeaController::class)->except(['index', 'create' , 'show'])->middleware(['auth']);
// Route::resource('ideas.comments', CommentController::class)->only(['create'])->middleware(['auth']);
Route::post('ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.create')->middleware(['auth']);
// Route::post('ideas/{idea}/comments', [CommentController::class, 'destroy'])->name('ideas.comments.destroy')->middleware(['auth']);
Route::resource('users', UserController::class)->only(['show']);  
Route::resource('users', UserController::class)->only(['edit','update'])->middleware(['auth']);  

Route::post('users/{user}/follow', [FollowerController::class,'follow'])->middleware(['auth'])->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class,'unfollow'])->middleware(['auth'])->name('users.unfollow');

Route::post('ideas/{idea}/like', [LikeController::class,'like'])->middleware(['auth'])->name('ideas.like');
Route::post('ideas/{idea}/unlike', [LikeController::class,'unlike'])->middleware(['auth'])->name('ideas.unlike');


