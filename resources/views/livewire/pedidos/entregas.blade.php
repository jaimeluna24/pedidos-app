<div>
    <x-alerts.success-alert />
    <x-alerts.error-alert />

    <div class="relative overflow-x-auto  border-b mb-2 p-4">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-1 sm:space-y-0 items-center justify-between ">
            <div class="flex items-center gap-8">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Lista de Entregas
                </div>
            </div>
            <div class="flex justify-between gap-4 w-full md:w-1/2">
                <div class="relative w-full">
                    <div
                        class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model.live="query" type="text" id="table-search"
                        class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar por número de pedido o factura">
                </div>
                <div>
                    @can('Registrar Entregas')
                    <a href="{{ route('pedidos.entregas.crear') }}">
                        <button type="button"
                            class="w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuevo</button>
                    </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    @if ($entregas->isEmpty())
        <x-empty />
    @else
        <div class="relative overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Código de Pedido
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Factura
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Proveedor
                        </th>
                        <th scope="col" class="px-6 py-3 hidden md:table-cell">
                            Fecha Solicitado
                        </th>
                        <th scope="col" class="px-6 py-3 hidden md:table-cell">
                            Fecha Aprobado
                        </th>
                        <th scope="col" class="px-6 py-3 hidden md:table-cell">
                            Fecha Entregado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entregas as $index => $item)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->pedido->numero_pedido }}
                            </th>
                            <td scope="row" class="px-4 py-2  whitespace-nowrap">
                                {{ $item->num_factura }}
                            </td>
                            <td scope="row" class="px-4 py-2  whitespace-nowrap">
                                {{ $item->pedido->proveedor->nombre_proveedor }}
                            </td>
                            <td scope="row" class="px-4 py-2 whitespace-nowrap">
                                {{ $item->pedido->created_at }}
                            </td>
                            <td class="px-4 py-2 hidden md:table-cell">
                                {{ $item->pedido->fecha_respuesta }}
                            </td>
                            <td class="px-4 py-2 hidden md:table-cell">
                                {{ $item->created_at }}
                            </td>
                            <td class="px-4 py-2 text-right">
                                @can('Ver Entregas')
                                <a href="{{ route('pedidos.entregas.detalles', $item->id) }}">
                                    <button type="button"
                                        class="w-full md:w-auto text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">Detalles</button>
                                </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($entregas->hasPages())
                <div class="mt-4">
                    {{ $entregas->links() }}
                </div>
            @endif
        </div>
    @endif

    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>
</div>
