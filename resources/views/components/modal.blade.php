@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'cultura-modal-sm',
    'md' => 'cultura-modal-md',
    'lg' => 'cultura-modal-lg',
    'xl' => 'cultura-modal-xl',
    '2xl' => 'cultura-modal-2xl',
][$maxWidth];
@endphp

<div
    x-data="{ show: @js($show) }"
    x-init="$watch('show', value => {
        document.body.classList.toggle('overflow-hidden', value)
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    class="cultura-modal-wrapper"
    style="display: {{ $show ? 'block' : 'none' }}"
>

    <!-- Fondo -->
    <div
        x-show="show"
        x-transition
        class="cultura-modal-overlay"
        x-on:click="show = false"
    ></div>

    <!-- Contenido -->
    <div
        x-show="show"
        x-transition
        class="cultura-modal {{ $maxWidth }}"
    >
        {{ $slot }}
    </div>
</div>
