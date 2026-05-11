@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/obras-form.css') }}">

<div class="form-container">

    <h1>Crear obra cultural</h1>

    <form action="{{ route('obras.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="titulo" placeholder="Título de la obra">

        <textarea name="descripcion" placeholder="Descripción de la obra"></textarea>

        <input type="text" name="tipo" placeholder="Tipo (arte, música, danza...)">

        <input type="text" name="autor" placeholder="Autor">

        <input type="date" name="fecha">

        <input type="file" name="imagen">

        <button type="submit">Guardar obra</button>

    </form>

</div>

@endsection