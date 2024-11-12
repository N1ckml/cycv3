@extends('adminlte::page')

@section('title', 'CRUD')

@section('content_header')
    <h1>EDITAR USUARIO</h1>
@stop

@section('content')
<form action="/usuarios/{{ $user->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ $user->name}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Apellido</label>
        <input id="apellido" name="apellido" type="text" class="form-control" value="{{ $user->apellido}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">DNI</label>
        <input id="dni" name="dni" type="text" class="form-control" value="{{ $user->dni}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Celular</label>
        <input id="celular" name="celular" type="text" class="form-control" value="{{ $user->celular}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input id="email" name="email" type="text" class="form-control" value="{{ $user->email}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input id="password" name="password" type="text" class="form-control" value="{{ $user->password}}">
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