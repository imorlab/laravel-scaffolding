@props([
    'showCopyright' => true,
    'copyrightText' => config('app.name', 'Laravel')
])

<footer class="bg-coral dark:bg-beige dark:text-gray-900 rounded-t-[2rem] shadow mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="text-center text-sm text-dark dark:text-dark">
            @if($showCopyright)
                &copy; {{ date('Y') }} {{ $copyrightText }}
            @endif
            
            {{ $slot ?? '' }}
        </div>
    </div>
</footer>
