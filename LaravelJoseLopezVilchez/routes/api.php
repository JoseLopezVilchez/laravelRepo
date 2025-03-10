<?php

use App\Http\Controllers\V1\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
Implementar la ruta "api/v1/user/userId/createTask" que recibe los parámetros "user_id", "title", "description" y "exp_date",
registra la tarea y devuelve un JSON indicando el resultado de la operación. (10 pts)
*/

Route::prefix('v1/')->middleware('api')->group(function () {
    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('papo/{userId}/createTask', [TaskController::class, 'create']);
    });
});
