@props(['active' => false])

@php
    $classes = ($active ?? false) ? 'active' : '';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</li>
