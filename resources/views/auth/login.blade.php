<x-guest-layout>
    <div class="login-container">
        <div class="login-card">

            <h2>Iniciar Sesión</h2>
            <p class="login-subtitle">Sistema Cultural de El Salvador 🇸🇻</p>

            <!-- Session Status -->
            <x-auth-session-status class="status-message" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="input-group">
                    <x-input-label for="email" :value="__('Correo electrónico')" />

                    <x-text-input
                        id="email"
                        class="custom-input"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Password -->
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

                <!-- Remember me -->
                <div class="remember-group">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        Recordarme
                    </label>
                </div>

                <!-- Actions -->
                <div class="login-actions">
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif

                    <x-primary-button class="login-btn">
                        {{ __('Ingresar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
