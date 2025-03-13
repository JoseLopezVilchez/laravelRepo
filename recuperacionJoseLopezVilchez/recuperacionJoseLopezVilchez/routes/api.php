<?php

use App\Http\Controllers\EjemploController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::prefix('/user')->group(function () {

        Route::put('/clic', [UserController::class, 'clic'])->name('users.clic');
        Route::put('/create', [UserController::class, 'create'])->name('users.create');

    });

});