@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 underline underline-offset-8 decoration-2 decoration-purple text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:decoration-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 no-underline text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:underline hover:underline-offset-8 hover:decoration-2 hover:decoration-gray-300 dark:hover:decoration-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:underline focus:underline-offset-8 focus:decoration-2 focus:decoration-gray-300 dark:focus:decoration-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
