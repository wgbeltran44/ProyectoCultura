<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <div class="profile-field">
            <label for="name">Nombre completo</label>
            <input id="name" name="name" type="text" class="profile-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="profile-field">
            <label for="email">Correo electrónico</label>
            <input id="email" name="email" type="email" class="profile-input" value="{{ old('email', $user->email) }}" required autocomplete="username">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-600">
                        Tu correo no está verificado.
                        <button form="send-verification" class="text-blue-600 hover:underline">Reenviar verificación</button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-green-600">Nuevo enlace enviado a tu correo.</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="profile-btn-primary">💾 Guardar cambios</button>
            @if (session('status') === 'profile-updated')
                <p class="profile-success">✓ Cambios guardados correctamente</p>
            @endif
        </div>
    </form>
</section>