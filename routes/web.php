<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RepliesController;
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


Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/', [PostController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Post Routes
Route::get('/edit-post/{id}', [HomeController::class, 'edit_user_post']);
Route::post('/post-update/{id}', [HomeController::class, 'update_user_post']);
Route::get('/add_post',[PostController::class, 'create']);
Route::get('/post/{id}',[PostController::class, 'show']);
Route::delete('/post/{id}',[PostController::class, 'destroy']);
Route::post('/create', [PostController::class, 'create_post']);

//Comment Routes
Route::post('/post/comment/{id}',[CommentController::class, 'store']);
Route::post('/post/{id}/{like}',[LikesController::class, 'store']);
Route::get('/comment/{id}',[CommentController::class, 'show']);
Route::delete('/comment/{id}',[CommentController::class, 'destroy']);
Route::post('/comment/{id}/reply',[CommentController::class, 'add_reply']);
});

