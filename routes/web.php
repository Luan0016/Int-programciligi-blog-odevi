<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [PostController::class, 'create'])->name('admin.create');
Route::post('/admin/post', [PostController::class, 'store'])->name('admin.store');
Route::delete('/admin/post/{id}', [PostController::class, 'destroy'])->name('admin.destroy');
