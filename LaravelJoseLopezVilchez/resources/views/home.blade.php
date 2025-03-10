@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Esto es resources/views/home.blade.php') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--
                        Añadir al proyecto 1 página pública donde aparezca un listado sólo con los nombres de los usuarios.
                        Mostrar listado de usuarios (10 ptos)
                        Implementar la autenticación de usuario. El listado de usuarios sólo será accesible para usuarios registrados (10 pts)
                    --}}
                    <h1>Tabla de usuarios</h1>
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col" style="background-color: slategray; color: white">Name</th>
                                <th scope="col" style="background-color: slategray; color: white">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                        @if (count($users) > 0)
                        {{-- En el listado de usuarios, añadir un botón para eliminar al usuario y todas sus tareas asociadas (10 ptos.) --}}
                            @foreach ($users as $user)
                                <tr>
                                    <td scope="row">{{ $user->name }}</td>
                                    {{--
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('alumno.update', $alumno->id) }}">Editar</a>
                                        <form action="{{ route('alumno.destroy') }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="submit" onclick="return confirm('Se va a eliminar el registro #{{$alumno->id}}')" value="Borrar"/>
                                        </form>
                                    </td>
                                    --}}
                                    <td scope="row">
                                        <form action="{{ route('user.destroy') }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="submit" onclick="return confirm('Se va a eliminar el registro #{{$user->id}}')" value="Borrar"/>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No hay objetos</td>
                            </tr>
                        @endif
                        </tbody>

                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
