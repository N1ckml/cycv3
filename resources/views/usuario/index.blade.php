@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@stop

@section('content')
    <a href="usuarios/create" class="btn btn-primary mb-3">CREAR</a>

<table id="usuarios" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Celular</th>
            <th scope="col">DNI</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo de Usuario</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->apellido }}</td>
            <td>{{ $user->celular }}</td>
            <td>{{ $user->dni }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->user_type == 1 ? 'Administrador' : 'Usuario Normal' }}</td>
            <td>
                <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                    <a href="/usuarios/{{ $user->id }}/edit" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

<script>
$(document).ready(function(){
    $('#usuarios').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
    });
});
</script>
@stop
