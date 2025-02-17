<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AlumnosController extends Controller
{
    protected $user;

    public function __construct(Request $request) {
        $token = $request->header('Authorization');
        //$token = JWTAuth::getToken(); //esto tambien valdria

        if ($token != '') {
            //en el caso de que se requiera autenticacion, obtenemos el usuario y lo almacenamos en una variable. Pero nosotros no lo vamos a utilizar (laravel lo usa por su cuenta)
            $this->user = JWTAuth::parseToken()->authenticate();
        }
    }

    //devuelve lista de productos
    public function index () {
        return Alumno::get();
    }

    public function store (Request $request) {
        //validación
        $data = $request->only('nombre', 'apellidos', 'edad', 'direccion', 'birth_date');
        $validator = Validator::make($data, [
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required|int',
            'direccion' => 'required|string',
            'birth_date' => 'required|date',
        ]);

        //si falla la validacion
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        //si supera la validacion, creamos el usuario
        $alumno = Alumno::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'birth_date' => $request->birth_date,
        ]);

        return response()->json([
            'message' => 'Alumno creado',
            'data' => $alumno,
        ], Response::HTTP_OK);
    }

    public function update (Request $request) {
        $data = $request->only('id', 'nombre', 'apellidos', 'edad', 'direccion', 'birth_date');
        $validator = Validator::make($data, [
            'id' => 'required|int',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required|int',
            'direccion' => 'required|string',
            'birth_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        $alumno = Alumno::findOrFail($request->id);
        $alumno->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'birth_date' => $request->birth_date,
        ]);

        //devolvemos los datos actualizados
        return response()->json([
            'message' => 'Se han actualizado los datos del alumno',
            'data' => $alumno,
        ], Response::HTTP_OK);
    }

    public function destroy ($id) {
        
        $alumno = Alumno::findOrFail($id);

        $alumno->delete();

        return response()->json([
            'message' => 'Se ha eliminado el alumno',
        ], Response::HTTP_OK);
    }

    public function show ($id) {
        return Alumno::findOrFail($id);
    }
}
