<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ADMIN DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bienvenido Administrador") }}
                </div>
                @if(session('pendingRestaurants') && count(session('pendingRestaurants')) > 0)
                    <ul>
                        @foreach(session('pendingRestaurants') as $restaurant)
                            <li>{{ $restaurant->nombre }}</li>
                        @endforeach
                    </ul>
                @else
                    <ul>
                        <li>No se encontraron restaurantes pendientes</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
