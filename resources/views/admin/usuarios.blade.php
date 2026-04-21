<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            🛠️ Administración de Usuarios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6 border">

                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-b">
                                <td class="py-2">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="px-2 py-1 rounded text-white text-sm
                                        {{ $user->role == 'admin' ? 'bg-red-500' : 'bg-blue-500' }}">
                                        {{ $user->role }}
                                    </span>
                                </td>

                                <td class="flex gap-2 py-2">

                                    <!-- CAMBIAR ROL -->
                                    <form method="POST" action="{{ route('admin.usuarios.role', $user->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <select name="role" class="border rounded px-2 py-1">
                                            <option value="usuario">usuario</option>
                                            <option value="admin">admin</option>
                                        </select>

                                        <button class="bg-blue-600 text-white px-3 py-1 rounded">
                                            Cambiar
                                        </button>
                                    </form>

                                    <!-- ELIMINAR -->
                                    <form method="POST" action="{{ route('admin.usuarios.delete', $user->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="bg-red-600 text-white px-3 py-1 rounded">
                                            Eliminar
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</x-app-layout>