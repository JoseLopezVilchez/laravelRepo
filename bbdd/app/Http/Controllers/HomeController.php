<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();

        return view('home', compact('users'));
    }

    public function queries () {
        //query builder

        //recuperar datos con db
        $alumnos = DB::table('alumnos')->get(); //esto devuelve todos los alumnos

        //filtrar con where
        $alumnos = DB::table('alumnos')->where('direccion', 'asdf')->get();
        $alumnos = DB::table('alumnos')->where('edad', '>', '25')->get();

        //obtener solo 1 resultado
        $alumnos = DB::table('alumnos')->where('edad', '>', 25)->first(); //si no devuelve ningun registro, devuelve null
        $alumnos = DB::table('alumnos')->where('edad', '>', 25)->firstOrFail(); //si no devuelve ningun registro, genera un error 404

        //obtener el valor de una sola columna
        $alumnos = DB::table('alumnos')->where('edad', '>', '25')->value('nombre');

        //obtener el valor de varias columnas
        $alumnos = DB::table('alumnos')->where('edad', '>', '25')->select('nombre', 'email')->get();

        //obtener un numero maximo de registros
        $alumnos = DB::table('alumnos')->where('edad', '>', '25')->find(3);

        //todos los valores de una columna
        $alumnos = DB::table('alumnos')->pluck('nombre'); //ojo, este saca un ARRAY del tipo asociado al valor. Los anteriores sacaban COLECCIONES, no es igual a value o select

        //fragmentar los resultados de la consulta (y ademas ordena). Es como el yield, puedes decidir el tamaño de lo que procesa cada vez
        $alumnos = DB::table('alumnos')->orderBy('id')->chunk(3, function (Collection $alumnos) {
            foreach ($alumnos as $a) {
                DB::table('alumnos')->update(['edad' => ($a->edad + 1)]); //esto actualiza el valor de cada entrada
            }
            //return false; //esto sirve para detener el chunk si hiciese falta
        });
        $alumnos = DB::table('alumnos')->chunkById(3, function (Collection $alumnos) { //esto es lo mismo que lo anterior, pero todo junto

        });

        //esto ya es complicar las cosillas - filtra con funcion anonima
        $alumnos = DB::table('alumnos')->where(function ($query) {
            $query->where('direccion', 'asdf')->orWhere('direccion', 'asdf'); //SELECT * FROM 'alumnos' WHERE 'direccion' lIKE 'asdf' OR 'direccion' LIKE 'asdf';
        });

        

    }
}
