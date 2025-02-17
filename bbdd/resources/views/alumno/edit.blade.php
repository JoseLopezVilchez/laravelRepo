@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('alumno.update', $alumno->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        <h1>Actualizar alumno</h1>

        @if(count($errors) > 0)
        <div class="alert alert-danger"><ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul></div>
        @endif

        @include('alumno._fields', ['modo' => 'Actualizar'])
        
    </form>
</div>
@endsection