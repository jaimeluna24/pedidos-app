<div>
    <x-alerts.success-alert />
    <x-alerts.error-alert />

    <div class="relative overflow-x-auto  border-b mb-2 p-4">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-1 sm:space-y-0 items-center justify-between ">
            <div class="flex items-center gap-8">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Crear Nuevo Pedido
                </div>
            </div>
        </div>
    </div>

    <div action="">
        <div class="grid gap-6 md:grid-cols-2 p-4">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de
                    Pedido</label>
                <input wire:model="numero_pedido" type="text" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="100788" minlength="3" required disabled />
                @error('codigo_producto')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Proveedor</label>
                <select id="countries" wire:model.live="proveedor_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option selected disabled>Seleccione</option>
                    @foreach ($proveedores as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre_proveedor }}</option>
                    @endforeach
                </select>
                @error('proveedor_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="w-full flex justify-between">
            <x-back-button ruta="pedidos.index" label="Regresar" />
            @if (is_numeric($proveedor_id) && $proveedor_id > 0)
                @can('Crear Pedidos')
                    <a href="{{ route('pedidos.agregar.productos', [$numero_pedido, $proveedor_id]) }}">
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar
                            Productos</button>
                    </a>
                @endcan
            @endif
        </div>
    </div>

    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>
</div>
