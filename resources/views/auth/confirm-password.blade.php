<x-guest-layout>
    <div class="confirm-container">
        <div class="confirm-card">
            <h2>Confirmar Contraseña</h2>
            <p class="description">
                Esta es un área segura del sistema. 
                Por favor confirma tu contraseña para continuar.
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="input-group">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input 
                        id="password"
                        class="custom-input"
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password" 
                    />

                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <div class="button-container">
                    <x-primary-button class="confirm-btn">
                        {{ __('Confirmar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
