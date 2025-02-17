<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\V1\AuthController;
use App\Mail\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Auth::routes(); //le podemos pasar parametros, como ['register' => false, 'reset' => false, 'verify' => false], las cuales harian que no crease las paginas (ni botones) de registro, reset ni verificacion 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
})->middleware('auth'); //con esto puedes aplicar el middleware de auth a una ruta, haciendo que debas estar registrado/logueado para verla

Route::group(['middleware' => 'auth'], function () {

    Route::resource('alumno', AlumnoController::class);

}); //Puedes hacerlo tambien con un grupo, y es mas comodo

Route::get('/queries', [HomeController::class, 'queries']);

Route::get('/sendmail', function () {
    //return (new Notification("Paco"))->render(); //esto es para ver el mensaje en el navegador
    $message = new Notification("Paco");
    Mail::to('jose.lopez@escuelaestech.es')
        ->cc('alfonso.marin@cesurformacion.com')
        ->bcc('alfonso.marin@qastusoft.com') //cc y bcc son para enviar copias (son opcionales)
        ->send($message); 
});