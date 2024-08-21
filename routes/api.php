<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TaskController::class, 'index'])->name('get-all-tasks');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('get-task-by-id');
Route::post('/tasks', [TaskController::class, 'store'])->name('add-task');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('update-task');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('delete-task');
