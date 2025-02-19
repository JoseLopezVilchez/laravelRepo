<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //obtener todos los registros
        $teams = Team::all();

        return view('teams.index', compact('teams')); //compact manda la info a la vista (en este caso se pasa $teams, por meterle 'teams' a compact)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'name' => 'required|string',
            'region' => 'required|string'
        ];

        $mensajes = [
            'required' => 'El campo :attribute es obligatorio'
        ];

        $this->validate($request, $campos, $mensajes);

        $datosTeam = $request->only('name', 'region');

        Team::insert($datosTeam);

        return redirect('teams');
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
