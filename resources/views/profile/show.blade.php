<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            👤 Mi Perfil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6 border">

                <div class="space-y-4">

                    <div>
                        <h3 class="text-lg font-bold">Nombre</h3>
                        <p>{{ $user->name }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold">Email</h3>
                        <p>{{ $user->email }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold">Rol</h3>
                        <span class="px-3 py-1 rounded text-white
                            {{ $user->role == 'admin' ? 'bg-red-500' : 'bg-blue-500' }}">
                            {{ $user->role }}
                        </span>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>