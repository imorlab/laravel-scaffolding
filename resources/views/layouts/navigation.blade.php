<nav x-data="{ open: false }" class="bg-slate dark:bg-slate">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-secondary hover:text-accent transition duration-150 ease-in-out" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="flex">
                <!-- Theme Selector -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-theme-selector align="right" width="36">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-secondary/70 bg-primary hover:text-secondary focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" class="dark:hidden" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" class="hidden dark:block" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <button onclick="toggleTheme()" class="block w-full px-4 py-2 text-left text-sm leading-5 text-secondary hover:bg-secondary/10 focus:outline-none focus:bg-secondary/10 transition duration-150 ease-in-out">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <span class="dark:hidden">{{ __('Modo oscuro') }}</span>
                                    <span class="hidden dark:block">{{ __('Modo claro') }}</span>
                                </div>
                            </button>
                        </x-slot>
                    </x-theme-selector>
                </div>

                <!-- Language Selector -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-language-selector align="right" width="32">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-secondary/70 bg-primary hover:text-secondary focus:outline-none transition ease-in-out duration-150">
                                <div>{{ strtoupper(app()->getLocale()) }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-secondary hover:bg-secondary/10 bg-primary focus:outline-none focus:bg-secondary/10 transition duration-150 ease-in-out" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ strtoupper($localeCode) }}
                                </a>
                            @endforeach
                        </x-slot>
                    </x-language-selector>
                </div>
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    @auth
                    <x-dropdown align="right" width="24">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-secondary/70 bg-primary hover:text-secondary focus:outline-none focus:bg-secondary/10 transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('profile.profile.title') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                    @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-sm text-secondary/70 hover:text-secondary focus:outline-none focus:bg-secondary/10 transition ease-in-out duration-150">{{ __('Iniciar sesión') }}</a>
                        <a href="{{ route('register') }}" class="text-sm text-secondary/70 hover:text-secondary focus:outline-none focus:bg-secondary/10 transition ease-in-out duration-150">{{ __('Registrarse') }}</a>
                    </div>
                    @endauth
                </div>
            </div>
            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            <!-- Theme Selector Mobile -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4 font-medium text-base text-gray-800 dark:text-gray-200">{{ __('Tema') }}</div>
                <div class="mt-3 space-y-1">
                    <button onclick="toggleTheme()" class="w-full flex items-center px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="dark:hidden">{{ __('Modo oscuro') }}</span>
                        <span class="hidden dark:block">{{ __('Modo claro') }}</span>
                    </button>
                </div>
            </div>
            
            <!-- Language Selector Mobile -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4 font-medium text-base text-gray-800 dark:text-gray-200">{{ __('Idioma') }}</div>
                <div class="mt-3 space-y-1">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <x-responsive-nav-link href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </x-responsive-nav-link>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('profile.profile.title') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @else
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Iniciar sesión') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Registrarse') }}
                </x-responsive-nav-link>
            </div>
        @endauth
    </div>
</nav>
