<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reiniciar', [App\Http\Controllers\UserController::class, 'reiniciar'])->name('reiniciar');
Route::get('/clicReset', [App\Http\Controllers\UserController::class, 'clicReset'])->name('clicReset');