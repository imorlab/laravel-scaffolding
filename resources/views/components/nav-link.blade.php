@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 underline underline-offset-8 decoration-2 decoration-accent text-sm font-medium leading-5 text-secondary focus:outline-none focus:decoration-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 no-underline text-sm font-medium leading-5 text-secondary/80 hover:text-secondary hover:underline hover:underline-offset-8 hover:decoration-2 hover:decoration-accent focus:outline-none focus:text-gray-700 focus:underline focus:underline-offset-8 focus:decoration-2 focus:decoration-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
