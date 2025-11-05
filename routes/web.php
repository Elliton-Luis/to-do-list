<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('login.index');
});

Route::resource('tasks', TaskController::class);
