<x-admin-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <!-- Total de Contactos -->
                <div class="relative flex flex-col min-w-0 break-words bg-primary/70 shadow-md shadow-secondary/50 rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal uppercase text-sm text-secondary">Total Contactos</p>
                                    <h5 class="mb-2 font-bold text-4xl text-red-400">237</h5>
                                    <p class="mb-0 text-secondary opacity-90">
                                        <span class="font-bold leading-normal text-sm text-lime-500">+12%</span>
                                        últimos 7 días
                                    </p>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-full bg-gradient-to-tl from-red-400 to-red-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 relative top-3 mx-auto text-gray-800">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contactos Pendientes -->
                <div class="relative flex flex-col min-w-0 break-words bg-primary/70 shadow-md shadow-secondary/50 rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-gray-800 dark:text-white font-semibold leading-normal uppercase text-sm">Pendientes</p>
                                    <h5 class="mb-2 font-bold text-4xl text-amber-500">12</h5>
                                    <p class="mb-0 text-secondary opacity-90">
                                        <span class="font-bold leading-normal text-sm text-lime-500">12%</span>
                                        del total
                                    </p>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-full bg-gradient-to-tl from-amber-500 to-amber-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 relative top-3 mx-auto text-gray-800">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contactos Procesados -->
                <div class="relative flex flex-col min-w-0 break-words bg-primary/70 shadow-md shadow-secondary/50 rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-gray-800 dark:text-white font-semibold leading-normal uppercase text-sm">Procesados</p>
                                    <h5 class="mb-2 font-bold text-4xl text-emerald-500">225</h5>
                                    <p class="mb-0 text-secondary opacity-90">
                                        <span class="font-bold leading-normal text-sm text-lime-500">80%</span>
                                        del total
                                    </p>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-full bg-gradient-to-tl from-emerald-500 to-emerald-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 relative top-3 mx-auto text-gray-800">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contactos Última Semana -->
                <div class="relative flex flex-col min-w-0 break-words bg-primary/70 shadow-md shadow-secondary/50 rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-gray-800 dark:text-white font-semibold leading-normal uppercase text-sm">Últimos 7 días</p>
                                    <h5 class="mb-2 font-bold text-4xl text-blue-500">12</h5>
                                    <p class="mb-0 text-secondary opacity-90">
                                        <span class="font-bold leading-normal text-sm text-lime-500">+12%</span>
                                        vs semana anterior
                                    </p>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-full bg-gradient-to-tl from-blue-500 to-blue-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 relative top-3 mx-auto text-gray-800">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 9v7.5" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Gráficos con Chart.js y Livewire -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="bg-primary/70 rounded-2xl shadow-md shadow-secondary/50 p-6">
                    <h3 class="text-lg text-gray-800 dark:text-white font-semibold mb-4">Distribución por Rol</h3>
                    <livewire:charts.role-distribution-chart />
                </div>
                
                <div class="bg-primary/70 rounded-2xl shadow-md shadow-secondary/50 p-6">
                    <h3 class="text-lg text-gray-800 dark:text-white font-semibold mb-4">Contactos por Día</h3>
                    <livewire:charts.contacts-per-day-chart />
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
