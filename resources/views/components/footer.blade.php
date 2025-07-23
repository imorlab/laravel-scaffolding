@props([
    'showCopyright' => true,
    'copyrightText' => config('app.name', 'Laravel')
])

<footer class="pt-12 pb-6">
    <div class="relative w-[95dvw] min-h-[10dvh] mx-auto flex items-center justify-center bg-gray-300/70 dark:bg-gray-600/70 dark:text-gray-900 rounded-[2rem] shadow">
        <div class="text-center text-sm text-gray-900 dark:text-gray-400">
            @if($showCopyright)
                &copy; {{ date('Y') }} {{ $copyrightText }}
            @endif
            
            {{ $slot ?? '' }}
        </div>
    </div>
</footer>
