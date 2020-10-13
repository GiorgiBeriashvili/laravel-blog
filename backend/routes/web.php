<?php

use App\Http\Controllers\PostController;
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

Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts/save', [PostController::class, 'save'])->name('posts.save');

Route::get('/posts/{post}', [PostController::class, 'read'])->name('posts.read');

Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}/delete', [PostController::class, 'delete'])->name('posts.delete');
