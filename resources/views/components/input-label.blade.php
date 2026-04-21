@props(['value'])

<label {{ $attributes->merge(['class' => 'cultura-input-label']) }}>
    {{ $value ?? $slot }}
</label>