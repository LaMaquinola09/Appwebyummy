<nav x-data="{ open: false }" class="bg-orange-500 dark:bg-gray-800 border-b border-orange-600 dark:border-gray-700">
<<<<<<< HEAD
=======
    <!-- Primary Navigation Menu -->
>>>>>>> 399112bf9b92bf95e08150db6147811e0a98f432
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('img/Logo_Blanco__1.png') }}" alt="Delivery Logo" class="block h-9 w-auto"/>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if(Auth::user()->rol === 'cliente')
                        <x-nav-link :href="route('cliente.dashboard')" :active="request()->routeIs('cliente.dashboard')" class="text-white hover:text-yellow-400">
                            {{ __('Cliente Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('cliente.historial')" :active="request()->routeIs('cliente.historial')" class="text-white hover:text-yellow-400">
                            {{ __('Historial de Pedidos') }}
                        </x-nav-link>
                    @endif

                    @if(Auth::user()->rol === 'repartidor')
                        <x-nav-link :href="route('repartidor.dashboard')" :active="request()->routeIs('repartidor.dashboard')" class="text-white hover:text-yellow-400">
                            {{ __('Repartidor Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('repartidor.pedidos')" :active="request()->routeIs('repartidor.pedidos')" class="text-white hover:text-yellow-400">
                            {{ __('Mis Pedidos') }}
                        </x-nav-link>
                    @endif

                    @if(Auth::user()->rol === 'restaurante')
                        <x-nav-link :href="route('restaurante.dashboard')" :active="request()->routeIs('restaurante.dashboard')" class="text-white hover:text-yellow-400">
                            {{ __('Restaurante Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('restaurante.menu')" :active="request()->routeIs('restaurante.menu')" class="text-white hover:text-yellow-400">
                            {{ __('Mi Menú') }}
                        </x-nav-link>
                    @endif
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

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-orange-500 hover:bg-orange-600 dark:text-gray-400 dark:bg-gray-800 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-700 dark:text-gray-200">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="text-gray-700 dark:text-gray-200"
                                onclick="event.preventDefault(); this.closest('form').submit();">

                            <x-dropdown-link :href="route('logout')" class="text-gray-700 dark:text-gray-200"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-yellow-400 hover:bg-orange-600 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::user()->rol === 'cliente')
                <x-responsive-nav-link :href="route('cliente.dashboard')" :active="request()->routeIs('cliente.dashboard')" class="text-white">
                    {{ __('Cliente Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('cliente.historial')" :active="request()->routeIs('cliente.historial')" class="text-white">
                    {{ __('Historial de Pedidos') }}
                </x-responsive-nav-link>
            @endif

            @if(Auth::user()->rol === 'repartidor')
                <x-responsive-nav-link :href="route('repartidor.dashboard')" :active="request()->routeIs('repartidor.dashboard')" class="text-white">
                    {{ __('Repartidor Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('repartidor.pedidos')" :active="request()->routeIs('repartidor.pedidos')" class="text-white">
                    {{ __('Mis Pedidos') }}
                </x-responsive-nav-link>
            @endif

            @if(Auth::user()->rol === 'restaurante')
                <x-responsive-nav-link :href="route('restaurante.dashboard')" :active="request()->routeIs('restaurante.dashboard')" class="text-white">
                    {{ __('Restaurante Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('restaurante.menu')" :active="request()->routeIs('restaurante.menu')" class="text-white">
                    {{ __('Mi Menú') }}
                </x-responsive-nav-link>
            @endif
        </div>

            <x-responsive-nav-link :href="route('pedidos')" :active="request()->routeIs('pedidos')" class="text-white">
                {{ __('Pedidos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('restaurants')" :active="request()->routeIs('restaurants')" class="text-white">
                {{ __('Restaurantes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('drivers')" :active="request()->routeIs('drivers')" class="text-white">
                {{ __('Repartidores') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-orange-400 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-yellow-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-white"
                        onclick="event.preventDefault(); this.closest('form').submit();">

                    <x-responsive-nav-link :href="route('logout')" class="text-white"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
