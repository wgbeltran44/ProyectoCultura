<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'cultura-danger-btn'
]) }}>
    {{ $slot }}
</button>