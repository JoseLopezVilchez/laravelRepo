<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoFormRequest;
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
        $datos['alumnos'] = Alumno::paginate(5);
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
    public function store(AlumnoFormRequest $request)
    {
        $this->authorize('create', Alumno::class);
        //Validación de los campos

        // //clave: nombre del campo; valor: requisitos
        // $campos = [
        //     'nombre' => 'required|string|max:200',
        //     'apellidos' => 'required|string|max:200',
        //     'edad' => 'required|int|gt:17',
        //     'direccion' => 'required|string|max:200',
        //     'fechaNac' => 'required|date',
        // ];

        // //Mensajes de error para cada regla
        // $mensaje = [
        //     'required' => 'El campo :attribute es obligatorio',
        //     'gt' => 'La :attribute debe ser mayor de :value',
        //     'max' => 'El campo :attribute no puede tener más de :max caracteres',
        // ];

        // $this->validate($request, $campos, $mensaje);

        //Obtener los datos de la petición y crear la instancia de Alumno
        // $datosAlumno = request()->except('_token'); //Cuando los nombre de los inputs del formulario coinciden con los nombres de los campos en la db
        $datosAlumno['nombre'] = $request->input('nombre');
        $datosAlumno['apellidos'] = $request->input('apellidos');
        $datosAlumno['edad'] = $request->input('edad');
        $datosAlumno['direccion'] = $request->input('direccion');
        $datosAlumno['birth_date'] = $request->input('fechaNac');

        //Procesar la foto
        if($request->hasFile('image')){
            $datosAlumno['image'] = $request->file('image')->store('uploads', 'public');
        }

        //Almacenar el objeto en la db
        Alumno::create($datosAlumno);

        session()->flash('msgOk', 'Se ha registrado al alumno ' . $datosAlumno['nombre']);

        //Redireccionar al index
        return redirect('alumno');
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
        $alumno = Alumno::findOrFail($id);

        return view('alumno.edit', ['alumno' => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlumnoFormRequest $request, Alumno $alumno)
    {
        $datosAlumno = request()->except('_token', '_method', 'fechaNac');
        $datosAlumno['birth_date'] = $request->fechaNac;

        //Si viene una foto en el request, eliminamos la antigua y guardamos la nueva
        if($request->hasFile('image')){
            Storage::disk('public')->delete($alumno->image);
            $datosAlumno['image'] = $request->file('image')->store('uploads', 'public');
        }

        Alumno::where('id', '=', $alumno->id)->update($datosAlumno);

        $alumno = Alumno::findOrFail($alumno->id);

        session()->flash('msgOk', "Se han actualizado los datos del alumno");

        return view('alumno.edit', compact('alumno'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Alumno::destroy($id);

        return redirect('alumno')->with('msgOk', "Se ha eliminado el alumno con id $id");
    }
}
