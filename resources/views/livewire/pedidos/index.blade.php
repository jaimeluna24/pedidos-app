<div>
    <x-alerts.success-alert />
    <x-alerts.error-alert />

    <div class="relative overflow-x-auto  border-b mb-2 p-4">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-1 sm:space-y-0 items-center justify-between ">
            <div class="flex items-center gap-8">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Lista de Pedidos
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
                        placeholder="Buscar por número de pedido o proveedor">
                </div>
                <div>
                    <a href="{{ route('pedidos.crear') }}">
                        <button type="button"
                            class="w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuevo</button>
                    </a>

                </div>
            </div>
        </div>
    </div>

    @if ($pedidos->isEmpty())
        <x-empty />
    @else
        <div class="relative overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Código
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Proveedor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 hidden md:table-cell">
                            Fecha Solicitado
                        </th>
                        <th scope="col" class="px-6 py-3 hidden md:table-cell">
                            Fecha Respuesta
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Entrega
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $index => $item)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->numero_pedido }}
                            </th>
                            <td scope="row"
                                class="px-4 py-2  whitespace-nowrap">
                                {{ $item->proveedor->nombre_proveedor }}
                            </td>
                            <td scope="row"
                                class="px-4 py-2  whitespace-nowrap">
                                {{ $item->estado_pedido }}
                            </td>
                            <td scope="row"
                                class="px-4 py-2 whitespace-nowrap">
                                {{ $item->created_at }}
                            </td>
                            <td
                                class="px-4 py-2 hidden md:table-cell">
                                {{ $item->fecha_respuesta ?? 'Sin Respuesta' }}
                            </td>
                            <td class="px-4 py-2 hidden md:table-cell">
                                {{ $item->estado_entrega ?? 'Sin respuesta' }}
                            </td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('pedidos.detalles', $item->id) }}">
                                    <button type="button"
                                        class="w-full md:w-auto text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">Detalles</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($pedidos->hasPages())
                <div class="mt-4">
                    {{ $pedidos->links() }}
                </div>
            @endif
        </div>
    @endif

    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>
</div>
