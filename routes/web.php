<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\Posts\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('posts', PostController::class);
Route::post('comment', [CommentController::class, 'store'])->name('comment.store');
Route::get('notifications', [NotificationController::class, 'notifications'])->name('notifications');
Route::put('notification-read', [NotificationController::class, 'markAsRead']);
Route::put('notification-all-read', [NotificationController::class, 'markAllAsRead']);
