<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $obras = Obra::all();
        } elseif (auth()->user()->role === 'artista') {
            $obras = Obra::where('user_id', auth()->id())->get();
        } else {
            $obras = Obra::all(); // usuario solo ve
        }

        return view('obras.index', compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'tipo' => 'required',
            'autor' => 'required',
            'fecha' => 'required',
            'imagen' => 'nullable|image'
        ]);

        $path = null;

    // 🔥 DEBUG IMPORTANTE (temporal si sigue fallando)
    // dd($request->file('imagen'));

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $path = $file->store('obras', 'public');
        }

        Obra::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'autor' => $request->autor,
            'fecha' => $request->fecha,
            'imagen' => $path, // 🔥 ESTO ES LO CLAVE
            'user_id' => auth()->id()
        ]);

        return redirect()->route('obras.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obra $obra)
    {
        return view('obras.show', compact('obra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obra $obra)
    {
        if (auth()->user()->role === 'artista' && $obra->user_id !== auth()->id()) {
            abort(403);
        }

        return view('obras.edit', compact('obra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obra $obra)
    {
        if (auth()->user()->role === 'artista' && $obra->user_id !== auth()->id()) {
            abort(403);
        }

        $obra->update($request->all());

        return redirect()->route('obras.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obra $obra)
    {
        if (auth()->user()->role === 'artista' && $obra->user_id !== auth()->id()) {
            abort(403);
        }

        $obra->delete();

        return redirect()->route('obras.index');
    }
}
