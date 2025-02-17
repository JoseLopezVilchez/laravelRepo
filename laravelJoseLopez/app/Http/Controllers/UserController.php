<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/*
Basándonos en el ejercicio de rutas:

Crea el controlador UserController

Mueve el código de la ruta para editar usuarios que creaste en el ejercicio de rutas ( /usuarios/{ID del usuario aquí}/edit), a una nueva acción edit dentro de UserController.

Crear las rutas que falten y las funciones correspondientes para completar el CRUD de usuarios: index, store, create, show, edit, update y destroy. Cada ruta mostrará al menos un string explicando la funcionalidad.

Divide la ruta de saludo /saludo1/nombre/nick en 2 rutas diferentes que apunten a 2 acciones diferentes, para de esta manera eliminar la necesidad de un condicional y el parámetro opcional. 
Estas dos rutas deben asociarse a diferentes funciones del controlador UserController.

Crear las vistas necesarias para /saludo/nombre/nick.
*/

class UserController extends Controller {
    public function manejo($idUsuario, $accion) {
        switch ($accion) {
            case 'edit':
                return $this->edit($idUsuario);
            case 'index':
                return $this->index();
            case 'create':
                return $this->create();
            case 'store':
                return $this->store();
            case 'show':
                return $this->show($idUsuario);
            case 'update':
                return $this->update($idUsuario);
            case 'destroy':
                return $this->destroy($idUsuario);
            default:
                abort(404, "Error, algo raro has hecho D:<");
        }
    }

    public function edit(string $idUsuario) : string{
        return 'Hola, usuario ' . $idUsuario . '!';
    }

    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        print 'Soy index, yo saco un listado de la DB.';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        print 'Soy create, yo muestro un form para crear algo nuevo.';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        print 'Soy store, yo guardo algo en la DB.';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idUsuario)
    {
        print 'Soy show, y muestro algo.';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $idUsuario)
    {
        print 'Soy update, y actualizo algo.';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idUsuario)
    {
        print 'SOY EL DESTRUCTOR DE MUNDOS CON MI DANZA DEL FIN DE LOS TIEMPOS';
    }

    public function saludoIncompleto(string $nombre)
    {
        print 'Bienvenido ' . $nombre . ', no tienes apodo.';
    }

    public function saludoCompleto(string $nombre, $nick) : View
    {
        return view('saludoCompleto', compact('nombre', 'nick'));
    }
}
