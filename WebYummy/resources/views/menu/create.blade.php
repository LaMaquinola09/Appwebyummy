<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agregar Nuevo Plato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('platos.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="restaurante_id" value="{{ $restaurante_id }}">
                        <div class="mb-4">
                            <label for="nombre_producto" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                            <input type="text" name="nombre_producto" id="nombre_producto" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('nombre_producto') }}">
                            @error('nombre_producto')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                            <input type="number" name="precio" id="precio" required step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('precio') }}">
                            @error('precio')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="imagen_url" class="block text-sm font-medium text-gray-700">Imagen URL</label>
                            <input type="text" name="imagen_url" id="imagen_url" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('imagen_url') }}">
                            @error('imagen_url')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="bg-orange-500 text-white font-bold py-2 px-4 rounded">Agregar Plato</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
