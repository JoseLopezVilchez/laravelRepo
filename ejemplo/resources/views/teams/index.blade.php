@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <a class="btn btn-primary" href="{{ route('teams.create') }}">+</a> </div>

                <div class="card-body">
                    
                    <table class="">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Region</th>
                            </tr>
                        </thead>

                        <tbody>
                        @if (count($teams) > 0)
                            @foreach ($teams as $team)
                                <tr>
                                    <th scope="row">{{ $team->id }}</th>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->region }}</td>
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
