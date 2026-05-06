@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/obras-form.css') }}">

<div class="form-container">

    <h1>Editar obra cultural</h1>

    {{-- IMAGEN ACTUAL --}}
    @if($obra->imagen)
        <img src="{{ asset('storage/' . $obra->imagen) }}" class="preview-img">
    @endif

    <form action="{{ route('obras.update', $obra->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="titulo" value="{{ $obra->titulo }}" placeholder="Título de la obra">

        <textarea name="descripcion" placeholder="Descripción de la obra">{{ $obra->descripcion }}</textarea>

        <input type="text" name="tipo" value="{{ $obra->tipo }}" placeholder="Tipo (arte, música, danza...)">

        <input type="text" name="autor" value="{{ $obra->autor }}" placeholder="Autor">

        <input type="date" name="fecha" value="{{ $obra->fecha }}">

        <input type="file" name="imagen">

        <button type="submit">Actualizar obra</button>

    </form>

</div>

@endsection