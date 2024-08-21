<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'userAccount'])->name('user-account');
    Route::post('/signup', [UserController::class, 'signup'])->name('signup');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'task'], function () {
    Route::get('/{id}', [TaskController::class, 'taskDetail'])->name('task-detail');
    Route::post('/{id}', [TaskController::class, 'updateTask'])->name('update-task');
});
