@extends('layouts.app') <!-- esto hace referencia a la carpeta layouts, al archivo app -->

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

                    {{ __('You are logged in!') }}

                    <table id="tablaUsuarios" class="table table-striped table-bordered">

                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td data-sort="{{ $user->email_verified_at }}">{{ \Carbon\Carbon::parse($user->email_verified_at)->isoFormat('D [de] MMMM [de] YYYY') }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#tablaUsuarios').DataTable({
            'columnDefs' : [
                //{'bSortable': false, 'aTargets':[-1]}
            ],
            'bSort' : true,
            'pageLength' : 5,
            'language' : { //para cambiar strings de distintas partes de la tabla en base a un objeto con pares key-value
                'sSearch' : 'Buscar: ',
                'sZeroRecords' : 'No se han encontrado coincidencias',
                'sEmptyTable' : 'No hay datos para mostrar en esta tabla',
                'sInfo' : 'Mostrando usuarios del _START_ al _END_ de un total de _TOTAL_ usuarios.',
                'sInfoEmpty' : 'Mostrando 0 usuarios',
                'sInfoFiltered' : '(Filtrando de un total de _MAX_ usuarios)'
            },
            'lengthMenu' : [ //relaciona los botones de numero de entradas con los strings que muestra en el desplegable
                [5, 10, 15, 20, 25, -1],
                [5, 10, 15, 20, 25, 'todos']
            ],
            'buttons' : [
                'copy', //permite copiar a cortapapeles
                'csv', //para exportar a csv
                'excel',
                'pdf',
                'print',
                'json'
            ]
        });
    });
</script>

@endsection
