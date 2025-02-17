<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function formulario () {
        return view('formulario');
    }

    function recibeForm (Request $request) {
        \Barryvdh\Debugbar\Facades\Debugbar::disable(); // esto cierra la barra de debug de barry

        //dd($request); //muestra el objeto request completo
        //dd($request->all()); //muestra las variables recibipas por get y post, es como un vardump
        //dd(\Request::all()); //lo mismo, utilizando la fachada de request
        //dd($request->input()); //enfocado en los datos del cuerpo de la solicitud, pero en la práctica ofrece la misma información
        //dd($request->input('nombre')); //muestra el valor del parametro cuyo nombre pasamos como argumento
        //dd($request->input('otro', 'nadie')); //imprime el valor del parametro nombre y, si no existe, devuelve el valor 
        //dd($request->input('numeros.0')); //imprime el valor del elemento 0 del array numeros
        //dd($request->collect()); //muestra los valores de los parametros de entrada de la peticion como una coleccion
        //dd($request->collect('numeros')); //muestra el valor del parametro 'numeros' como una coleccion
        /*$request->collect('numeros')->each(function ($n) {
            print ('Valor: ' . $n);
        });*/ //recorre la coleccion 'numeros' ejecutando la funcion each por cada elemento
        /*if ($request->hasAny(['nombre', 'otro'])) {
            print 'Tiene los parametros indicados';
        }*/ //
        /*if ($request->filled('nombre')) {
            print 'El parametro nombre tiene un valor no nulo';
        }*/ //
        //$request->flash(); //flashea los parametros en la sesion, para que esten disponibles en la siguiente peticion
        //$request->flashOnly(['name']); //flashea solo parametros concretos
        //$request->flashExcept)['fecha']); //flashea todos los parametros excepto los indicados
        //return redirect('/form')->withInput($request->input()); //hace una redirección con parámetros
        //dd($request->cookie('cookieName')); //muestra el valor de la cookie 'cookieName'

        print 'Bienvenido ' . $request->nombre;
    }
}
