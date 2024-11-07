@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>Listado de usuarios</h1>
@stop

@section('content')
    <a href="usuarios/create" class="btn btn-primary mb-3">CREAR</a>

<table id="usuarios" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
<thead class="bg-primary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">APELLIDO</th>
        <th scope="col">DNI</th>
        <th scope="col">CELULAR</th>
        <th scope="col">CORREO</th>
        <th scope="col">CONTRASEÑA</th>
        <th scope="col">ACCIONES</th>
    </tr>
</thead>
<tbody>
    @foreach($usuarios as $usuario)
    <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->nombre }}</td>
        <td>{{ $usuario->apellido }}</td>
        <td>{{ $usuario->dni }}</td>
        <td>{{ $usuario->celular }}</td>
        <td>{{ $usuario->correo }}</td>
        <td>{{ $usuario->contrasenia }}</td>
        <td>
            <form action="{{ route ('usuarios.destroy', $usuario->id) }}" method="POST">
            <a href="/usuarios/{{ $usuario->id }}/edit" class="btn btn-info">Editar</a>
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
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5s.css" rel="stylesheet">
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
} );
</script>
@stop