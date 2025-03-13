<?php

namespace App\Http\Controllers;

use App\Models\Ejemplo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class EjemploController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Mostrando listado de ejemplos',
            'data' => Ejemplo::all()
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('nombre', 'descripcion'); //toma únicamente esos elementos
        $validator = Validator::make($data, [ //verifica los datos
            'nombre' => ['required', 'string'], //esto puede hacerse así o tal que: 'nombre' => 'required|string'
            'descripcion' => ['required', 'string']
        ]);

        if ($validator->fails()) { //si falla la validación, devuelve un error y un código de respuesta, en json
            return response()->json(['error' => $validator->messages()], Response::HTTP_BAD_REQUEST);
        }

        $ejemplo = Ejemplo::create([ //create instancia de modelo
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);

        return response()->json([
            'message' => 'Ejemplo creado, devolviendo copia del objeto creado para que puedas comprobarlo si quieres',
            'data' => $ejemplo
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ejemplo $ejemplo)
    {
        return response()->json([
            'message' => 'Mostrand ejemplo concreto',
            //'data' => Ejemplo::findOrFail($ejemplo)
            'data' => $ejemplo
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ejemplo $ejemplo)
    {
        $data = $request->only('nombre', 'descripcion');
        $validator = Validator::make($data, [
            'nombre' => ['required', 'string'],
            'descripcion' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], Response::HTTP_BAD_REQUEST);
        }

        $ejemplo->nombre = $request->nombre;
        $ejemplo->descripcion = $request->descripcion;

        // Si quieres actualizar otros campos que no están en el request, lo puedes hacer manualmente
        /*if ($request->has('otro')) {
            $ejemplo->otro = $request->otro;
        }*/

        // Guardar los cambios en la base de datos
        $ejemplo->save();

        return response()->json([
            'message' => 'Ejemplo actualizado, devolviendo copia del objeto creado para que puedas comprobarlo si quieres',
            'data' => $ejemplo
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ejemplo $ejemplo)
    {
        $ejemplo->delete();

        return response()->json([
            'message' => 'Ejemplo eliminado con éxito, devolviendo copia del objeto eliminado',
            'data' => $ejemplo
        ], Response::HTTP_OK);
    }
}
