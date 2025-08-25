<?php

use Illuminate\Support\Facades\Route;
use Modules\Projects\Http\Controllers\TaskController;
use Modules\Projects\Http\Controllers\ProjectController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('projects', ProjectController::class)->names('projects');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tasks', TaskController::class)->names('tasks');
});
