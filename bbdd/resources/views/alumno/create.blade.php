@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('alumno.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Registrar alumno</h1>

        @if(count($errors) > 0)
        <div class="alert alert-danger"><ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul></div>
        @endif

        @include('alumno._fields', ['modo' => 'Crear'])
        
    </form>
</div>
@endsection