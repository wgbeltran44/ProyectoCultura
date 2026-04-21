<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Mostrar usuarios
    public function index()
    {
        $users = User::all();
        return view('admin.usuarios', compact('users'));
    }

    // Cambiar rol de usuario
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Rol actualizado correctamente');
    }

    // Eliminar usuario (opcional pero útil)
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Usuario eliminado');
    }
}