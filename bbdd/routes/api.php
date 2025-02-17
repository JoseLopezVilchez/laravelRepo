<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\AlumnosController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/')->middleware('api')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('get-user', [AuthController::class, 'getUser']);

    //rutas con autenticación
    Route::group(['middleware' => ['jwt.verify']], function () {
        
        Route::prefix('productos')->group(function () {
            Route::get('lista', [AlumnosController::class, 'index']);
            Route::post('crear', [AlumnosController::class, 'store']);
            Route::post('actualizar', [AlumnoController::class, 'update']);
            Route::delete('eliminar/{id}', [AlumnoController::class, 'destroy']);
            Route::show('mostrar/{id}', [AlumnoController::class, 'show']);
        });

    });
});

