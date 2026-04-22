<x-app-layout>
    <x-slot name="header">
        <div class="admin-header">
            <h2 class="admin-title">🛠️ Administración de Usuarios</h2>
            <span class="admin-total">
                Total: {{ count($users) }} usuarios
            </span>
        </div>
    </x-slot>

    <div class="admin-container">
        <div class="admin-wrapper">

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="admin-card">
                <div class="admin-subtitle">
                    Gestión de usuarios registrados
                </div>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr class="admin-row">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="{{ $user->role == 'admin' ? 'role-admin' : 'role-user' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="admin-actions">

                                        <!-- CAMBIAR ROL -->
                                        <form method="POST"
                                              action="{{ route('admin.usuarios.role', $user->id) }}"
                                              class="role-form">
                                            @csrf
                                            @method('PUT')

                                            <select name="role" class="select-role">
                                                <option value="usuario"
                                                    {{ $user->role == 'usuario' ? 'selected' : '' }}>
                                                    Usuario
                                                </option>
                                                <option value="admin"
                                                    {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                    Admin
                                                </option>
                                            </select>

                                            <button type="submit" class="btn-blue">
                                                Cambiar
                                            </button>
                                        </form>

                                        <!-- ELIMINAR -->
                                        <form method="POST"
                                              action="{{ route('admin.usuarios.delete', $user->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-red">
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
</x-app-layout>