<div>
    <x-alerts.success-alert />
    <x-alerts.error-alert />

    <div class="relative overflow-x-auto border-b mb-2 p-4">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-1 sm:space-y-0 items-center justify-between">
            <div class="items-center gap-8">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Detalles de Pedido
                </div>
                <div class="text-md font-semibold text-gray-900 dark:text-white">
                    Pedido: {{ $numero_pedido }} | Proveedor: {{ $nombre_proveedor }}
                </div>
            </div>
            <div class="flex justify-end gap-4 w-full md:w-1/2">
                <div>
                    <a href="{{ route('pedidos.editar', [$numero_pedido, $proveedor_id]) }}">
                        <button type="button"
                            class="w-full md:w-auto text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">Editar</button>
                    </a>
                        <button type="button" onclick="modal_eliminar.showModal()"
                            class="w-full md:w-auto text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <div action="">

        <div class="p-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-end pb-4">
                    {{-- <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                            Seleccione
                        </div> --}}
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
                                Código
                            </th>
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
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productosPedidos as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->producto->codigo_producto }}
                                </th>
                                <td class="px-6 py-2">
                                    {{ $item->producto->nombre_producto }}
                                </td>
                                <td class="px-6 py-2">
                                    {{ $item->producto->unidad->nombre_unidad_medida }}
                                    ({{ $item->producto->unidad->siglas }})
                                </td>
                                <td class="px-6 py-2">
                                    L. {{ $item->precio_unitario }}
                                </td>
                                <td class="px-6 py-2">
                                    {{ $item->cantidad }}
                                </td>
                                <td class="px-6 py-2">
                                    L. {{ $item->subtotal }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pl-6 pr-6 mb-6">

            <label for="message"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observación</label>
            <textarea id="message" rows="4" wire:model="observacion_pedido" disabled
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escribe tu observación"></textarea>
        </div>

        <div class="w-full flex justify-between">
            <x-back-button ruta="pedidos.index" label="Regresar" />
        </div>
    </div>

    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>

    @include('components.modals.eliminar')

</div>
