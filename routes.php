<?php

use App\Controllers\AuthController;
use App\Controllers\PostsController;
use App\Controllers\PublicController;
use App\Route;

Route::get('/', [PublicController::class, 'index']);

Route::get('/us', [PublicController::class, 'us']);
Route::get('/form', [PublicController::class, 'form']);
Route::post('/answer', [PublicController::class, 'answer']);

Route::get('/admin/posts', [PostsController::class, 'index']);
Route::get('/admin/posts/create', [PostsController::class, 'create']);
Route::post('/admin/posts', [PostsController::class, 'store']);
Route::get('/admin/posts/edit', [PostsController::class, 'edit']);
Route::post('/admin/posts/edit', [PostsController::class, 'update']);
Route::get('/admin/posts/delete', [PostsController::class, 'destroy']);

Route::get('/posts/show', [PostsController::class, 'show']);

Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/profile', [AuthController::class, 'profileForm']);
Route::post('/profile', [AuthController::class, 'updateProfile']);

Route::get('/PasswordResetRequest', [AuthController::class, 'passwordResetRequestForm']);
Route::post('/PasswordResetRequest', [AuthController::class, 'passwordResetRequest']);
Route::get('/PasswordReset', [AuthController::class, 'passwordResetForm']);
Route::post('/PasswordReset', [AuthController::class, 'passwordReset']);
route::post('/delete-account', [AuthController::class, 'deleteAccount']);

route::post('/storeComment', [PostsController::class, 'storeComment']);
route::get('/posts/show/delete', [PostsController::class, 'destroyComment']);
Route::get('/comments/edit', [PostsController::class, 'editComment']);
Route::post('/comments/update', [PostsController::class, 'updateComment']);