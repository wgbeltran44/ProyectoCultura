<x-guest-layout>
    <h2>Crear Cuenta</h2>
    <p class="login-subtitle">Regístrate en el Sistema Cultural 🇸🇻</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="input-group">
            <x-input-label for="name" :value="__('Nombre completo')" />
            <x-text-input id="name" class="custom-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="error-message" />
        </div>

        <!-- Email -->
        <div class="input-group">
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="custom-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="error-message" />
        </div>

        <!-- Password -->
        <div class="input-group">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="custom-input" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>

        <!-- Confirm Password -->
        <div class="input-group">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
            <x-text-input id="password_confirmation" class="custom-input" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
        </div>

        <!-- Actions -->
        <div class="login-actions" style="margin-top: 1.5rem;">
            <a class="forgot-link" href="{{ route('login') }}">
                ← Ya tengo cuenta
            </a>

            <x-primary-button class="login-btn">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ url('/') }}" class="forgot-link" style="font-size: 13px;">
                Volver al inicio
            </a>
        </div>
    </form>
</x-guest-layout>