<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'cultura-secondary-btn'
]) }}>
    {{ $slot }}
</button>