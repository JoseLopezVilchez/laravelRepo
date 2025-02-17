@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('alumno.create') }}">Registrar alumno</a>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1>Listado de alumnos</h1>

            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Dirección</th>
                        <th>Fecha de nacimiento</th>

                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->id }}</td>
                            <td><img height="60px" src="{{ asset('storage/' . $alumno->image) ?? 'uploads/avatar.jpeg' }}"></img></td>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->apellidos }}</td>
                            <td>{{ $alumno->edad }}</td>
                            <td>{{ $alumno->direccion }}</td>
                            <td>{{ \Carbon\Carbon::parse($alumno->birth_date).format('d/m/Y') }}</td>

                            <td>
                                <a class="btn btn-primary" href="{{ route('alumno.update', $alumno->id) }}">Editar</a>
                                <form action="{{ route('alumno.destroy') }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" onclick="return confirm('Se va a eliminar el registro #{{$alumno->id}}')" value="Borrar"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $alumnos->links() !!}
        </div>
    </div>
</div>
@endsection