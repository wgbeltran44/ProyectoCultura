@extends('layouts.app')

@section('content')

<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 class="titulo">Obras culturales</h1>
        
        <div>
            <a href="{{ route('pdf.obras.export') }}" 
               style="background-color: #dc2626; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; margin-right: 10px; display: inline-block;">
                Exportar todas a PDF
            </a>
            
            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'artista')
                <a href="{{ route('obras.create') }}" 
                   style="background-color: #2563eb; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; display: inline-block;">
                    Crear obra
                </a>
            @endif
        </div>
    </div>

    <div class="grid">
        @foreach($obras as $obra)
            <div class="card">
                @if($obra->imagen)
                    <img src="{{ asset('storage/' . $obra->imagen) }}" class="imagen">
                @else
                    <img src="{{ asset('images/default.jpg') }}" class="imagen">
                @endif

                <p><strong>{{ $obra->titulo }}</strong></p>
                <p style="font-size: 12px; color: #666;">{{ $obra->autor ?? 'Anónimo' }}</p>

                <div style="display: flex; gap: 10px; margin-top: 10px; justify-content: center;">
                    <a href="{{ route('pdf.obra.export', $obra->id) }}" 
                       style="color: #dc2626; text-decoration: none; font-size: 14px;">
                        PDF
                    </a>
                    
                    <a href="{{ route('pdf.obra.preview', $obra->id) }}" 
                       style="color: #3b82f6; text-decoration: none; font-size: 14px;">
                        Vista
                    </a>

                    @if(auth()->user()->role === 'admin' || auth()->id() === $obra->user_id)
                        <a href="{{ route('obras.edit', $obra->id) }}" 
                           style="color: #2563eb; text-decoration: none;">
                            Editar
                        </a>

                        <form action="{{ route('obras.destroy', $obra->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: #dc2626; background: none; border: none; cursor: pointer;">
                                Eliminar
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection