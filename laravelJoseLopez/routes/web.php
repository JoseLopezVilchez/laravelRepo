<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*Crear las siguientes rutas:

La ruta / debe devolver una vista llamada welcome1.*/

Route::get('/', function () {
    return view('welcome1');
});

//La ruta /saludo1 debe devolver la vista welcome2.
//Renombrar la primera ruta /saludo1 a primerSaludo.

Route::get('/saludo1', function () {
    return view('welcome2');
})->name('primerSaludo');

/*Divide la ruta de saludo /saludo1/nombre/nick en 2 rutas diferentes que apunten a 2 acciones diferentes, para de esta manera eliminar la necesidad de un condicional y el parámetro opcional. 
Estas dos rutas deben asociarse a diferentes funciones del controlador UserController.*/

Route::get('/saludo1/{nombre}', [UserController::class, 'saludoIncompleto']);
Route::get('/saludo1/{nombre}/{nick}', [UserController::class, 'saludoCompleto']);

/*Crea una ruta para editar usuarios (la URL debería tener el formato /usuarios/{ID del usuario aquí}/edit). Debe devolver: “Hola, usuario ID!”
Nota: La ID sólo debería aceptar enteros.*/

Route::get('/usuarios/{idUsuario}/{accion}', [UserController::class, 'manejo'])
    ->where('idUsuario', '[0-9]+')
    ->where('accion', 'edit|index|create|store|show|update|destroy');

//Crear la ruta con url /saludoTodos que acepte todos los verbos http.

Route::any('/saludoTodos', function () : string {
    return 'saludo';
});

/*Crear un grupo de rutas que compartan el prefijo saludo2 con las siguientes rutas:
   saludo2/               que devuelve la vista welcome2
   saludo2/uno        que devuelve la vista welcome2
   saludo2/{id}        que solo acepta id como numero entero de 3 dígitos y escriba: Hola, id!
   saludo2/{nombre}    que solo acepta nombres de 4 caracteres de longitud alfanumericos, y escriba: nombre tiene 4 letras.*/

Route::prefix('/saludo2')->group(function () {
    Route::get('/', function () {
        return view('welcome2');
    });

    Route::get('/uno', function () {
        return view('welcome2');
    });

    Route::get('/{id}', function ($id) {
        print 'Hola, ' . $id . '!';
    }) -> where('id', '[0-9]{3}');

    Route::get('/{nombre}', function ($nombre) {
        print $nombre . ' tiene 4 letras.';
    }) -> where('nombre', '[0-9a-zA-Z]{4}');
});

//Crear una ruta /saludoUno que redirija a la url saludo1 y /saludoDos a la url saludo2.

Route::redirect('/saludoUno', '/saludo1');
Route::redirect('/saludoDos', '/saludo2');

//Finalmente habrá una ruta por defecto que mostrará el mensaje “ERROR 404”, que capturara las peticiones inválidas.

Route::fallback(function () {
    print 'ERROR 404';
});

//Redirigir ruta /otroSaludoUno a primerSaludo, usando su nombre de ruta.

Route::get('/otroSaludoUno', function () {
    return redirect()->route('primerSaludo');
});