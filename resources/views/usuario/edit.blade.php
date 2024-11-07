@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>EDITAR USUARIO</h1>
@stop

@section('content')
<form action="/usuarios/{{ $usuario->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" value="{{ $usuario->nombre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Apellido</label>
        <input id="apellido" name="apellido" type="text" class="form-control" value="{{ $usuario->apellido}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">DNI</label>
        <input id="dni" name="dni" type="text" class="form-control" value="{{ $usuario->dni}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Celular</label>
        <input id="celular" name="celular" type="text" class="form-control" value="{{ $usuario->celular}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input id="correo" name="correo" type="text" class="form-control" value="{{ $usuario->correo}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input id="contrasenia" name="contrasenia" type="text" class="form-control" value="{{ $usuario->contrasenia}}">
    </div>

    <a href="/usuarios" class="btn btn-secondary" tabindexx="7">Cancelar</a>
    <button type=" submit" class="btn btn-primary" tabindexx="8">Guardar</button>
</form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop