<?php

use App\Http\Controllers\EjemploController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('api')->group(function () {

    Route::prefix('ejemplos')->group(function () {

        Route::get('/', [EjemploController::class, 'index']);
        Route::post('/store', [EjemploController::class, 'store']);
        Route::get('/{ejemplo}', [EjemploController::class, 'show']);
        Route::put('/update/{ejemplo}', [EjemploController::class, 'update']);
        Route::destroy('/delete/{ejemplo}', [EjemploController::class, 'delete']); //puede que me equivoque y deba usar put() en vez de destroy()

    });

});