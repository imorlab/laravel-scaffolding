<div
    x-data="{ isOpen: @entangle('isOpen') }"
    x-show="isOpen"
    x-on:keydown.escape.window="isOpen = false"
    x-cloak
>
    <div class="fixed inset-0 bg-gray-900/30 z-40" x-on:click="isOpen = false"></div>

    <div
        class="fixed top-0 right-0 h-full w-full max-w-md bg-white dark:bg-gray-800 shadow-xl z-50 transform transition-transform duration-300 ease-in-out"
        x-show="isOpen"
        x-transition:enter="transform transition ease-in-out duration-300 sm:duration-500"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-300 sm:duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
    >
        <div class="p-6 h-full flex flex-col">
            <div class="flex justify-between items-center border-b pb-4 mb-4 border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                    @if($action === 'view')
                        Ver Usuario
                    @elseif($action === 'edit')
                        Editar Usuario
                    @elseif($action === 'delete')
                        Eliminar Usuario
                    @else
                        Nuevo Usuario
                    @endif
                </h2>
                <button wire:click="closeSidebar" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <div class="flex-grow overflow-x-hidden space-y-8">
                @if($user)
                    @if($action === 'view')
                        <div class="space-y-4 text-gray-700 dark:text-gray-300">
                            <div><strong>ID:</strong> {{ $user->id }}</div>
                            <div><strong>Nombre:</strong> {{ $user->name }}</div>
                            <div><strong>Email:</strong> {{ $user->email }}</div>
                            <div><strong>Verificado:</strong> {{ $user->email_verified_at ? $user->email_verified_at->format('d/m/Y H:i') : 'No' }}</div>
                            <div><strong>Creado:</strong> {{ $user->created_at->format('d/m/Y') }}</div>
                        </div>
                    @elseif($action === 'edit')
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-[2rem]">
                        @include('profile.partials.update-profile-information-form')
                    </div>
    
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-[2rem]">
                        @include('profile.partials.update-password-form')
                    </div>
    
                    @elseif($action === 'delete')
                        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-[2rem]">
                            @include('profile.partials.delete-user-form')
                        </div>
                    @endif
                @else
                    {{-- Formulario para crear nuevo usuario --}}
                     <p class="text-gray-700 dark:text-gray-300">Formulario para crear un nuevo usuario.</p>
                @endif
            </div>
        </div>
    </div>
</div>
