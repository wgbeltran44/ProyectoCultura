@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'cultura-input-error']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
