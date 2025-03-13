<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAge;


Route::group(['middleware' => 'auth'], function(){

    // Route::get('/', function () { return view('welcome'); });

    Route::get('/', [AlumnoController::class, 'index']);

    Route::resource('alumno', AlumnoController::class);


});

Route::get('form', [TestController::class, 'formulario']);
Route::post('recibeForm', [TestController::class, 'recibeForm']);

//Aplicar un middleware a una única ruta
Route::get('/mayores', function(){
    return "Hola, persona mayor de edad.";
})->middleware(CheckAge::class);

//Crear un grupo de rutas al que se aplica un middleware
Route::group(['middleware' => [CheckAge::class]], function(){

    Route::get('/mayores2', function(){
        return "Hola, persona mayor de edad.";
    });
    Route::get('/mayores3', function(){
        return "Hola, persona mayor de edad.";
    });

});

Route::middleware([CheckAge::class])->group(function(){
    Route::get('/mayores4', function(){
        return "Hola, persona mayor de edad.";
    });
    Route::get('/mayores5', function(){
        return "Hola, persona mayor de edad.";
    });

});

Auth::routes();
// Auth::routes(['register' => false, 'reset' => false, 'verify' => false]); //No crearía las páginas de registro, reset ni verify

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
