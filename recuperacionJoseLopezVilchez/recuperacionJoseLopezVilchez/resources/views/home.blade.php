@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ App::make("UserController")->clic() }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="button" name="clic" id="clic" value="Haz clic aqui">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
