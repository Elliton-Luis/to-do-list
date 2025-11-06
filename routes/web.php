<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskTrashController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::middleware('guest')->group(function () {

Route::get('/', [LoginController::class, 'login'])->name('login.index');

Route::post('/auth', [LoginController::class, 'authUser'])->name('login.auth');

Route::get('/register', [RegisterController::class, 'register'])->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('tasks', TaskController::class);

    Route::get('lixeira', [TaskTrashController::class, 'index'])->name('tasks.trash');

    Route::put('lixeira/{task}/restore', [TaskTrashController::class, 'update'])->name('tasks.restore');

    Route::delete('lixeira/{task}/force-delete', [TaskTrashController::class, 'destroy'])->name('tasks.forceDelete');
});
