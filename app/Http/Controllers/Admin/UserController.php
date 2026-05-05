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
        $request->validate([
            'role' => 'required|in:admin,artista,usuario'
        ]);

        $user = User::findOrFail($id);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Rol actualizado correctamente');
    }

    // Eliminar usuario
    public function delete($id)
    {
        $user = User::findOrFail($id);

        // 🚨 evitar auto-eliminación
        if (auth()->id() == $user->id) {
            return back()->with('error', 'No puedes eliminarte a ti mismo');
        }

        $user->delete();

        return back()->with('success', 'Usuario eliminado');
    }
}