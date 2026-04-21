<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'cultura-primary-btn'
]) }}>
    {{ $slot }}
</button>