@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'cultura-status-message']) }}>
        {{ $status }}
    </div>
@endif