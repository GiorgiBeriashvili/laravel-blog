<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MailController;
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

Route::get('/', function () { return view('home'); })->name('home');

Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/register', [AuthenticationController::class, 'postRegister'])->name('post_register');
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'postLogin'])->name('post_login');

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/my_posts', [PostController::class, 'myPosts'])->name('my_posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/save', [PostController::class, 'save'])->name('posts.save');
    Route::get('/posts/{post}', [PostController::class, 'read'])->name('posts.read');
    Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::patch('/posts/{post}/approve', [PostController::class, 'approve'])->name('posts.approve');
    Route::delete('/posts/{post}/delete', [PostController::class, 'delete'])->name('posts.delete');


    Route::get('/mail/create', [MailController::class, 'create'])->name('mail.create');
    Route::post('/mail/send', [MailController::class, 'send'])->name('mail.send');

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});

