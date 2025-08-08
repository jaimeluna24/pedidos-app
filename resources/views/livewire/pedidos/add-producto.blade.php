<div>
    <x-alerts.success-alert />
    <x-alerts.error-alert />

    <div class="relative overflow-x-auto  border-b mb-2 p-4">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-1 sm:space-y-0 items-center justify-between ">
            <div class="items-center gap-8">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Agregar Productos
                </div>
                <div class="text-md font-semibold text-gray-900 dark:text-white">
                    Pedido: {{ $numero_pedido }} | Proveedor: {{ $nombre_proveedor }}
                </div>
            </div>
        </div>
    </div>

    <div action="">

        <div class="p-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div
                    class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                        Seleccione
                    </div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" wire:model.live="query"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Buscar por Nombre de Producto">
                    </div>
                </div>

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Producto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unidad Medida
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio Unitario
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acción
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($productosDisponibles->isEmpty())
                            <div class="flex justify-center gap-8 border-b">
                                <div class="text-2xl font-semibold text-gray-900 dark:text-white mb-10 mt-10">
                                    Todos los productos coincidentes ya han sido seleccionados
                                </div>
                            </div>
                        @else
                            @foreach ($productosDisponibles as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-1 font-medium text-gray-900 dark:text-white">
                                        {{ $item->nombre_producto }}
                                    </th>
                                    <td class="px-6 py-1">
                                        {{ $item->unidad->nombre_unidad_medida }}
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap">
                                        L. {{ $item->total_isv }}
                                    </td>
                                    <td class="px-6 py-1">
                                        <div class="flex items-center">
                                            <form wire:submit.preven="agregarProducto({{ $item->id }})" id="form-{{ $item->id }}">
                                                <input type="number" id="first_product-{{ $item->id }}"
                                                    wire:model="productoCantidad.{{ $item->id }}"
                                                    class="bg-gray-50 w-24 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Ingrese" required min="1" autocomplete="off" />
                                            </form>

                                        </div>
                                    </td>
                                    <td class="px-6 py-1">
                                        <button
                                            type="submit" form="form-{{ $item->id }}"
                                            class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-1.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Agregar</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>


        @if ($resumenPedido)

            <div class="p-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div
                        class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-start pb-4">
                        <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                            Resumen
                        </div>
                        {{-- <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search" wire:model.live="query"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Buscar por Nombre de Producto">
                        </div> --}}
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Producto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Unidad Medida
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Precio Unitario
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cantidad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    SubTotal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resumenPedido as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-1 font-medium text-gray-900 dark:text-white">
                                        {{ $item['nombre_producto'] }}
                                    </th>
                                    <td class="px-6 py-1">
                                        {{ $item['unidad_medida'] }}
                                    </td>
                                    <td class="px-6 py-1">
                                        L. {{ $item['precio_unitario'] }}
                                    </td>
                                    <td class="px-6 py-1">
                                        <div class="flex items-center gap-1">
                                            <div>
                                                @if ($modo_edicion_id === $item['producto_id'])
                                                    <input type="number" id="first_product-{{ $item['producto_id'] }}"
                                                        value="{{ $item['cantidad'] }}" @disabled($modo_edicion_id !== $item['producto_id'])
                                                        wire:model.defer="cantidadEditada.{{ $item['producto_id'] }}"
                                                        class="bg-gray-50 w-24 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="1" required min="0" autocomplete="off" />
                                                @else
                                                    <input type="number" id="first_product-{{ $item['producto_id'] }}"
                                                        value="{{ $item['cantidad'] }}" @disabled($modo_edicion_id !== $item['producto_id'])
                                                        class="bg-gray-50 w-24 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="1" required min="0" autocomplete="off" />
                                                @endif

                                            </div>
                                            @if ($modo_edicion_id === $item['producto_id'])
                                                <button wire:click="guardar({{ $item['producto_id'] }})"
                                                    class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-green-300 rounded-full focus:outline-none hover:bg-green-100 focus:ring-4 focus:ring-green-200 dark:bg-green-800 dark:text-green-400 dark:border-green-600 dark:hover:bg-green-700 dark:hover:border-green-600 dark:focus:ring-green-700"
                                                    type="button">
                                                    <span class="sr-only">Quantity button guardar</span>

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 24 24">
                                                        <path fill="#ffffff"
                                                            d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                                                    </svg>
                                                </button>
                                            @else
                                                <button wire:click="editarCantidad({{ $item['producto_id'] }})"
                                                    class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-orange-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-orange-200 dark:bg-orange-800 dark:text-orange-400 dark:border-orange-600 dark:hover:bg-orange-700 dark:hover:border-orange-600 dark:focus:ring-orange-700"
                                                    type="button">
                                                    <span class="sr-only">Quantity button editar</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" viewBox="0 0 24 24">
                                                        <g fill="none" stroke="#ffffff" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.5">
                                                            <path
                                                                d="M19.09 14.441v4.44a2.37 2.37 0 0 1-2.369 2.369H5.12a2.37 2.37 0 0 1-2.369-2.383V7.279a2.356 2.356 0 0 1 2.37-2.37H9.56" />
                                                            <path
                                                                d="M6.835 15.803v-2.165c.002-.357.144-.7.395-.953l9.532-9.532a1.36 1.36 0 0 1 1.934 0l2.151 2.151a1.36 1.36 0 0 1 0 1.934l-9.532 9.532a1.36 1.36 0 0 1-.953.395H8.197a1.36 1.36 0 0 1-1.362-1.362M19.09 8.995l-4.085-4.086" />
                                                        </g>
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-1">
                                        L. {{ $item['subtotal'] }}
                                    </td>
                                    <td class="px-6 py-1">
                                        <button wire:click="quitarProducto({{ $item['producto_id'] }})"
                                            type="button"
                                            class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-1.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Quitar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @endif

        <div class="pl-6 pr-6 mb-6">

            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observación
                (Opcional)</label>
            <textarea id="message" rows="4" wire:model="observacion_pedido"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escribe tu observación"></textarea>
        </div>

        <div class="w-full flex justify-between">
            <x-back-button ruta="pedidos.crear" label="Regresar" />
            @if ($resumenPedido)
            @can('Crear Pedidos')
                <button type="button" wire:click="crear()"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar</button>
                @endcan
            @endif

        </div>
    </div>

    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>
</div>
