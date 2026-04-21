<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <div class="profile-field">
            <label for="update_password_current_password">Contraseña actual</label>
            <input id="update_password_current_password" name="current_password" type="password" class="profile-input" autocomplete="current-password">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="profile-field">
            <label for="update_password_password">Nueva contraseña</label>
            <input id="update_password_password" name="password" type="password" class="profile-input" autocomplete="new-password">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="profile-field">
            <label for="update_password_password_confirmation">Confirmar contraseña</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="profile-input" autocomplete="new-password">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="profile-btn-primary">🔐 Actualizar contraseña</button>
            @if (session('status') === 'password-updated')
                <p class="profile-success">✓ Contraseña actualizada</p>
            @endif
        </div>
    </form>
</section>