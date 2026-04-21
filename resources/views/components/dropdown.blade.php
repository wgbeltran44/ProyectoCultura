@props([
    'align' => 'right',
    'width' => '48',
    'contentClasses' => 'cultura-dropdown-content'
])

@php
$alignmentClasses = match ($align) {
    'left' => 'cultura-dropdown-left',
    'top' => 'cultura-dropdown-top',
    default => 'cultura-dropdown-right',
};

$widthClass = match ($width) {
    '48' => 'w-48',
    default => $width,
};
@endphp

<div class="relative" x-data="{ open: false }"
     @click.outside="open = false"
     @close.stop="open = false">

    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
         x-transition
         class="cultura-dropdown {{ $widthClass }} {{ $alignmentClasses }}"
         style="display: none;"
         @click="open = false">

        <div class="{{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>