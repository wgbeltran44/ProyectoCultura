@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="titulo">Obras culturales</h1>

    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'artista')
        <a href="{{ route('obras.create') }}">Crear obra</a>
    @endif

    <div class="grid">

        @foreach($obras as $obra)
            <div class="card">

                @if($obra->imagen)
                    <img src="{{ asset('storage/' . $obra->imagen) }}" class="imagen">
                @endif

                <p>{{ $obra->titulo }}</p>

                @if(auth()->user()->role === 'admin' || auth()->id() === $obra->user_id)
                    <a href="{{ route('obras.edit', $obra) }}">Editar</a>

                    <form action="{{ route('obras.destroy', $obra) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                @endif

            </div>
        @endforeach

    </div>
</div>

@endsection