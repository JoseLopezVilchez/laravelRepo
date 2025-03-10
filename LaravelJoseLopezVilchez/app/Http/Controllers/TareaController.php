<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $userId)
    {
        $data = $request->only('titulo', 'descripcion', 'vencimiento');
        $validator = Validator::make($data, [
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'vencimiento' => 'required|date'
        ]);

        //si falla la validacion
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }

        $tarea = Tarea::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'vencimiento' => $request->vencimiento,
            'user_id' => $userId
        ]);

        return response()->json([
            'message' => 'Tarea creada',
            'data' => $tarea,
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
