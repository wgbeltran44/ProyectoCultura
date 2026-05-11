@extends('layouts.app')

@section('header')
    <div class="admin-header flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
        <h2 class="admin-title text-2xl font-semibold">🛠️ Administración de Usuarios</h2>
        <span class="admin-total text-slate-600">Total: {{ count($users) }} usuarios</span>
    </div>
@endsection

@section('content')
    <div class="admin-container py-12">
        <div class="admin-wrapper max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="success-message mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="admin-card bg-white rounded-xl shadow border border-slate-200 overflow-hidden">
                <div class="admin-subtitle bg-slate-50 px-6 py-4 font-semibold text-slate-700">
                    Gestión de usuarios registrados
                </div>

                <div class="overflow-x-auto">
                    <table class="admin-table w-full text-left border-collapse">
                        <thead class="bg-slate-100 text-slate-700">
                            <tr>
                                <th class="px-6 py-3">Nombre</th>
                                <th class="px-6 py-3">Email</th>
                                <th class="px-6 py-3">Rol</th>
                                <th class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                                <tr class="admin-row border-t border-slate-200">
                                    <td class="px-6 py-4">{{ $user->name }}</td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">
                                        <span class="{{ $user->role == 'admin' ? 'role-admin' : 'role-user' }} inline-flex items-center rounded-full px-3 py-1 text-sm font-medium">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="admin-actions flex flex-col gap-3 sm:flex-row sm:flex-wrap">

                                            <form method="POST"
                                                  action="{{ route('admin.usuarios.role', $user->id) }}"
                                                  class="role-form flex items-center gap-2">
                                                @csrf
                                                @method('PUT')

                                                <select name="role" class="select-role rounded-md border border-slate-300 px-3 py-2">
                                                    <option value="usuario" {{ $user->role == 'usuario' ? 'selected' : '' }}>
                                                        Usuario
                                                    </option>
                                                    <option value="artista" {{ $user->role == 'artista' ? 'selected' : '' }}>
                                                        Artista
                                                    </option>
                                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                        Admin
                                                    </option>
                                                </select>

                                                <button type="submit" class="btn-blue rounded-md bg-slate-900 text-white px-3 py-2 hover:bg-slate-700">
                                                    Cambiar
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('admin.usuarios.delete', $user->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn-red rounded-md bg-rose-600 text-white px-3 py-2 hover:bg-rose-500">
                                                    Eliminar
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection