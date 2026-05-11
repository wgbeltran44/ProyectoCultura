<section class="space-y-4">
    <div style="background: #fef2f2; border-left: 4px solid #dc2626; padding: 1rem; border-radius: 12px;">
        <p style="color: #991b1b; font-size: 0.875rem; margin: 0;">
            Una vez eliminada tu cuenta, todos los datos serán borrados permanentemente.
        </p>
    </div>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="profile-btn-danger"
    >
        Eliminar cuenta
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                ¿Estás seguro de eliminar tu cuenta?
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Ingresa tu contraseña para confirmar la eliminación permanente.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Contraseña" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full profile-input"
                    placeholder="Tu contraseña"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close-modal', 'confirm-user-deletion')" class="profile-btn-secondary">
                    Cancelar
                </button>
                <button type="submit" class="profile-btn-danger">
                    Eliminar cuenta definitivamente
                </button>
            </div>
        </form>
    </x-modal>
</section>