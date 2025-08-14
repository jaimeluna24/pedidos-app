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

                <button type="button" wire:click="generarPDF()"
                    class="w-full md:w-auto text-white bg-orange-700 hover:bg-yellow-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">Descargar
                    PDF</button>
                @if ($pedido->estado_pedido == 'Pendiente')
                    <div>
                        @can('Editar Pedidos')
                            <a href="{{ route('pedidos.editar', [$numero_pedido, $proveedor_id]) }}">
                                <button type="button"
                                    class="w-full md:w-auto text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">Editar</button>
                            </a>
                        @endcan
                        @can('Eliminar Pedidos')
                            <button type="button" onclick="modal_eliminar.showModal()"
                                class="w-full md:w-auto text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Eliminar</button>
                        @endcan
                    </div>
                @else
                    <div>
                        @if ($pedido->estado_pedido == 'Aprobado')
                            <div class="flex items-center p-2 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                role="alert">
                                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Pedido Aprobado</span>
                                </div>
                            </div>
                        @endif
                        @if ($pedido->estado_pedido == 'Cancelado')
                            <div class="flex items-center p-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                role="alert">
                                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Pedido Cancelado</span>
                                </div>
                            </div>
                        @endif

                    </div>

                @endif
            </div>
        </div>
    </div>

    <div action="">

        <div class="p-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div
                    class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-end pb-4">
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
                        <tfoot>
                        <tr>
                            <td colspan="5" class="text-right font-bold px-6 py-2">Total:</td>
                            <td class="font-bold px-6 py-2">L. {{ number_format($totalDetalle, 2) }}</td>
                        </tr>
                    </tfoot>
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
            @if ($pedido->estado_pedido == 'Pendiente')
                @can('Aprobar/Rechazar Pedidos')
                    <div>
                        <button type="button" onclick="modal_aprobar.showModal()"
                            class="w-full md:w-auto text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Aprobar
                            Pedido</button>

                        <button type="button" onclick="modal_cancelar.showModal()"
                            class="w-full md:w-auto text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancelar
                            Pedido</button>
                    </div>
                @endcan
            @else
                <div>
                    @if ($pedido->estado_pedido == 'Aprobado')
                        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                            role="alert">
                            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Pedido Aprobado</span> por el usuario
                                {{ $pedido->respondido_por }}
                                el {{ $pedido->fecha_respuesta }}
                            </div>
                        </div>
                    @endif
                    @if ($pedido->estado_pedido == 'Cancelado')
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert">
                            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Pedido Cancelado</span> por el usuario
                                {{ $pedido->respondido_por }}
                                el {{ $pedido->fecha_respuesta }}
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>

    @include('components.modals.eliminar')
    @include('components.modals.aprobar-pedido')
    @include('components.modals.rechazar-pedido')


</div>
