@extends('layouts.plantillabase');

@section('contenido')
<h2>CREAR REGISTROS</h2>

<form action="/usuarios" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindexx="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Apellido</label>
        <input id="apellido" name="apellido" type="text" class="form-control" tabindexx="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">DNI</label>
        <input id="dni" name="dni" type="text" class="form-control" tabindexx="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Celular</label>
        <input id="celular" name="celular" type="text" class="form-control" tabindexx="4">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input id="correo" name="correo" type="text" class="form-control" tabindexx="5">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input id="contrasenia" name="contrasenia" type="text" class="form-control" tabindexx="6">
    </div>

    <a href="/usuarios" class="btn btn-secondary" tabindexx="7">Cancelar</a>
    <button type=" submit" class="btn btn-primary" tabindexx="8">Guardar</button>
</form>
@endsection