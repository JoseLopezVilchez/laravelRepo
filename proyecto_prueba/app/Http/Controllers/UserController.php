<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller {
    
    public function saludo(string $nombre) : View {
        /*$ejemplo = 100;
        dd($ejemplo);*/ //dd() es una funcion de laravel que hace el equivalente a var_dump() y die();
        return view('user.saludo', compact('nombre')); //user.saludo -> user/saludo.blade.php // compact mete todas las variables en un array para poder coger esos datos
    }

    /*public function __invoke(Request $request) { // si este controlador solo tuviese una cosa, puedes hacer esto
        print 'blah';
    }*/
    
}
