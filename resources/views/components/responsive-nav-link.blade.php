@props(['active'])

@php
$classes = ($active ?? false)
    ? 'cultura-responsive-nav-active'
    : 'cultura-responsive-nav';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
