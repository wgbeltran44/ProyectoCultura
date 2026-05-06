@props(['active'])

@php
$classes = ($active ?? false)
    ? 'cultura-nav-link-active'
    : 'cultura-nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
