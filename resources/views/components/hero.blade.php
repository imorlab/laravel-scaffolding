<header class="relative w-full h-[90dvh] flex items-center justify-center overflow-hidden">
    <div class="w-full h-full mx-auto flex items-center justify-center">

        <div class="relative w-[95dvw] h-[90dvh] rounded-[2rem] overflow-hidden shadow-lg">
            <!-- Imagen de fondo -->
            <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-gray-900"></div>

            <!-- Efecto de lava lamp morado -->
            <div class="absolute inset-0">
                <!-- Fondo base morado oscuro -->
                <div class="absolute inset-0 bg-[#630346]/60"></div>

                <!-- Burbujas de lava -->
                <div class="absolute inset-0">
                    <div class="absolute w-[150%] aspect-square -left-1/4 animate-lava-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#48077A] to-transparent rounded-full blur-xl opacity-80"></div>
                    </div>
                    <div class="absolute w-[150%] aspect-square -right-1/4 animate-lava-2">
                        <div class="absolute inset-0 bg-gradient-to-tl from-[#631C96] to-transparent rounded-full blur-xl opacity-80"></div>
                    </div>
                    <div class="absolute w-[120%] aspect-square -top-1/4 animate-lava-3">
                        <div class="absolute inset-0 bg-gradient-to-b from-[#240141] to-transparent rounded-full blur-xl opacity-70"></div>
                    </div>
                </div>
            </div>

            <!-- Contenido del header -->
            <div class="relative z-10 flex flex-col items-center justify-end h-full text-center p-4 lg:p-12">
                <!-- Logo o título de la aplicación -->
                <div class="absolute top-20 lg:top-24 left-1/2 transform -translate-x-1/2">
                    <a href="{{ route('home') }}" class="text-white text-2xl font-bold">
                        <x-application-logo-12 />
                    </a>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-7xl font-bold mb-4 lg:mb-6 max-w-7xl opacity-80 starting:opacity-0 duration-750 starting:translate-y-4">
                    <span class="text-white leading-tight">
                        {{ __('hero.title') }}
                    </span>
                </h1>

                <p class="text-lg sm:text-xl lg:text-3xl text-white mb-6 lg:mb-16 max-w-4xl mx-auto leading-relaxed opacity-80 starting:opacity-0 duration-750 starting:translate-y-4">
                    {{ __('hero.subtitle') }}
                </p>

                <!-- CTA con efecto hover -->
                <!-- <a href="#contact" class="inline-block relative group">
                    <span class="relative z-10 inline-block px-8 py-3 lg:px-12 lg:py-4 bg-transparent text-white text-lg lg:text-xl font-medium rounded-full transition-all duration-300 transform border border-white hover:bg-white hover:text-black">
                        {{ __('hero.cta') }}
                    </span>
                </a> -->
            </div>
        </div>
    </div>
</header>

<style>
@keyframes lava-1 {
    0% {
        transform: translateY(0%) translateX(0%) scale(1);
    }
    33% {
        transform: translateY(-20%) translateX(15%) scale(1.3);
    }
    66% {
        transform: translateY(15%) translateX(-15%) scale(0.8);
    }
    100% {
        transform: translateY(0%) translateX(0%) scale(1);
    }
}

@keyframes lava-2 {
    0% {
        transform: translateY(0%) translateX(0%) scale(1);
    }
    33% {
        transform: translateY(20%) translateX(-15%) scale(0.7);
    }
    66% {
        transform: translateY(-15%) translateX(15%) scale(1.2);
    }
    100% {
        transform: translateY(0%) translateX(0%) scale(1);
    }
}

@keyframes lava-3 {
    0% {
        transform: translateY(0%) translateX(0%) scale(1);
    }
    33% {
        transform: translateY(15%) translateX(20%) scale(1.25);
    }
    66% {
        transform: translateY(-20%) translateX(-15%) scale(0.75);
    }
    100% {
        transform: translateY(0%) translateX(0%) scale(1);
    }
}

.animate-lava-1 {
    animation: lava-1 12s infinite ease-in-out;
}

.animate-lava-2 {
    animation: lava-2 14s infinite ease-in-out;
}

.animate-lava-3 {
    animation: lava-3 16s infinite ease-in-out;
}
</style>
