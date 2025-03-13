<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function formulario(){
        // dd(\Request::all());
        return view('formulario');
    }

    public function recibeForm(Request $request){
        \Barryvdh\Debugbar\Facades\Debugbar::disable(); //Deshabilitar el debugbar en esta función

        // dd($request); //Muestra el objeto Request completo
        // dd($request->all()); //Muestra las variables recibidas por GET, POST, etc... Eq~: var_dump($_REQUEST); die();
        // dd(\Request::all()); //Lo mismo, utilizando la fachada de Request
        // dd($request->input()); //Está enfocado en los datos del cuerpo de la solicitud, pero en la práctica, ofrece la misma salida que all()
        // dd($request->input('nombre')); //Muestra el valor del parámetro cuyo nombre pasamos como argumento. En este caso, "nombre"
        // dd($request->input('otro', "nadie")); //Imprime el valor del parámetro "nombre" y, si no existe, devuelve el valor "nadie"
        // dd($request->input('numeros.0')); //Imprime el valor del elemento 0 del array numeros
        // dd($request->collect()); //Muestra los valores de los parámetros de entrada de la petición como una colección
        // dd($request->collect('numeros')); //Muestra el valor del parámetro "numeros" como una colección
        /*
        $request->collect('numeros')->each(function($n){ //Recorre la colección "numeros", ejecutando la función anónima con cada elemento de la colección
            echo "Valor: " . $n ."<br/>";
        });
        */
        // dd($request->date('fecha')); //Para obtener fechas
        // dd($request->boolean('check')); //Para obtener un booleano
        // dd($request->only(['nombre', 'fecha'])); //Imprime SÓLO los valores de los parámetros que se indican en el array
        // dd($request->except(['fecha'])); //Imprime todos los parámetros EXCEPTO los indicados
        /*
        if ($request->has(['nombre'])){ //Comprobar si se ha recibido un parámetro Eq~: isset
            echo "El nombre es " . $request->nombre;
        }
        */
        /*
        $request->whenHas('nombre', function($param){ //Ejecuta la funcion anónima cuando existe el parámetro
            echo "El valor es " . $param;
        });
        */
        /*
        $request->whenMissing('meloinvento', function($param){ //Ejecuta la funcion anónima cuando no existe el parámetro
            echo "El parámetro no existe";
        });
        */
        /*
        $request->whenFilled('nombre', function($param){ //Ejecuta la funcion anónima cuando el parámetro tiene un valor no nulo
            echo "El parámetro tiene el valor " . $param;
        });
        */
        /*
        if ($request->hasAny(['nombre', 'otro'])){
            echo "Tiene uno de los parámetros indicados";
        }
        */
        /*
        if ($request->filled('nombre')){
            echo "El parámetro 'nombre' tiene un valor no nulo";
        }
        */
        // $request->flash(); //Flashea los parámetros en la sesión, para que estén disponibles en la siguiente petición
        // $request->flashOnly(['nombre']); //Flashea sólo parámetros concretos. Eq~: $_SESSION['nombre'] = $_REQUEST['nombre'];
        // $request->flashExcept(['fecha']); //Flashea todos los parámetros, excepto los indicados
        // return redirect('/form')->withInput($request->input()); //Hace una redirección con parámetros. También funciona con redirect()->route()->withInput()
        dd($request->cookie('cookieName')); //Muestra el valor de la cookie "cookieName"



        echo "<br>Bienvenido $request->nombre";
    }
}
