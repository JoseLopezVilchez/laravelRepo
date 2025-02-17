<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['alumnos'] = Alumno::all();
        return view('alumno.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Alumno::class);
        //para validacion de campos
        //clave: nombre del campo; valor: requisitos
        $campos = [
            'nombre' => ['required', 'string', 'max:200'], //tambien puedes pasarlo asi: 'required|string|max:200'
            'apellidos' => ['required', 'string', 'max:200'],
            'edad' => ['required', 'int', 'gt:17'], //gt = greater than
            'direccion' => ['required', 'string', 'max:200'],
            'nacimiento' => ['required', 'date']
        ];

        $mensaje = [ //Esto es lo que dice en caso de que las reglas no se cumplan. Este campo es opcional
            'required' => ':attribute es obligatorio', //:attribute se reemplaza por el campo al que se refiera

        ];

        $this->validate($request, $campos, $mensaje);

        //obtener los datos de la peticion y almacenar el objeto en la db
        //$datosAlumno = request()->except('_token'); //cuando los nombres de los inputs del formulario coindicen con los nombres de los campos de la db, puedes meterlos directamente
        $datosAlumno['nombre'] = $request->input('nombre');
        $datosAlumno['apellidos'] = $request->input('apellidos');
        $datosAlumno['edad'] = $request->input('edad');
        $datosAlumno['direccion'] = $request->input('direccion');
        $datosAlumno['birth_date'] = $request->input('nacimiento');

        if ($request->hasFile('image')) {
            $datosAlumno['image'] = $request->file('image')->store('uploads', 'public');
        }

        Alumno::insert($datosAlumno); //esto mete el dato en la db, asi de simple

        session()->flash('msgOk', 'Se ha registrado ' . $datosAlumno['nombre']);

        return redirect('alumno')->with('mensaje', 'Alumno registrado satisfactoriamente');
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
        $alumno = Alumno::findOrFail($id); //si no lo encuentra, devuelve error

        return view('alumno.edit', compact(['alumno' => $alumno]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {

        $datosAlumno = request()->except('__token', '__method', 'nacimiento');
        $datosAlumno['birth_date'] = $request->nacimiento;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($alumno->image);
            $datosAlumno['image'] = $request->file('image')->store('uploads', 'public');
        }

        Alumno::where('$id', '=', $alumno->id)->update($datosAlumno);

        $alumno = Alumno::findOrFail($alumno->id);

        session()->flash('msgOk', 'Se han actualizado los datos del alumno');

        return view('alumno.edit', compact('alumno'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Alumno::destroy($id);

        return redirect('alumno')->with('msgOK', "Se ha eliminado el alumno con id $id");
    }
}
