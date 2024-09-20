<nav x-data="{ open: false }" class="bg-orange-500 dark:bg-orange-500 border-b border-orange-600 dark:border-gray-700">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="container shrink-0 flex items-center mx-auto justify-between">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <img src="{{ asset('img/Logo_Blanco__1.png') }}" alt="Delivery Logo" class="block w-auto h-10 mr-3"/>
                        <span class="text-white text-lg font-semibold">YUMMY</span>
                    </a>
                </div>
                <!-- Navigation Links -->

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('pedidos')" :active="request()->routeIs('pedidos')" class="text-white hover:text-yellow-400">
                        {{ __('Pedidos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('restaurants')" :active="request()->routeIs('restaurants')" class="text-white hover:text-yellow-400">
                        {{ __('Restaurantes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('drivers')" :active="request()->routeIs('drivers')" class="text-white hover:text-yellow-400">
                        {{ __('Repartidores') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" class="text-white">
                    {{ __('Iniciar sesión') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')" class="text-white">
                    {{ __('Regístrate') }}
                </x-responsive-nav-link>
        </div>
    </div>
</nav>
