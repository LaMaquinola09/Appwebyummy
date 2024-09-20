<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MENÚ RESTAURANTE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Menú de Platos</h2>

                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-500 text-white p-4 mb-4 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <a href="{{ route('platos.create') }}" class="bg-orange-500 text-white font-bold py-2 px-4 rounded mb-4">Agregar Nuevo Plato</a>

                    <table class="min-w-full leading-normal mt-4">
                        <thead>
                            <tr class="header bg-gray-100">
                                <th>Nombre del Producto</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Imagen URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($platos as $plato)
                                <tr>
                                    <td>{{ $plato->nombre_producto }}</td>
                                    <td>{{ $plato->descripcion }}</td>
                                    <td>{{ $plato->precio }}</td>
                                    <td>{{ $plato->imagen_url }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
