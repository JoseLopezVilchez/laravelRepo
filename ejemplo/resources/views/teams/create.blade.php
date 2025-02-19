@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <a class="btn btn-primary" href="{{ route('teams.create') }}">+</a> </div>

                <div class="card-body">
                    
                    <form action="{{ route('teams.store') }}" method="POST" enctype="x-www-form-urlencoded">
                        @csrf
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del equipo">
                        </div>
                        <div class="form-group">
                          <label for="region">Región</label>
                          <input type="text" class="form-control" id="region" name="region" placeholder="Región del equipo">
                        </div>
                        <button type="submit" class="btn btn-primary">Mandar</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
