<div>
    <x-alerts.success-alert />
    <x-alerts.error-alert />

    <div class="relative overflow-x-auto  border-b mb-2 p-4">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-1 sm:space-y-0 items-center justify-between ">
            <div class="flex items-center gap-8">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Inventario
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
                        placeholder="Buscar por nombre">
                </div>
            </div>
        </div>
    </div>

    @if ($inventarios->isEmpty())
        <x-empty />
    @else
        <div class="relative overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-3 text-center">
                            Cod. Producto
                        </th>
                        <th scope="col" class="px-12 py-3 text-center">
                            Nombre de Producto
                        </th>
                        <th scope="col" class="px-10 py-3 text-center">
                            Proveedor
                        </th>
                        <th scope="col" class="px-5 py-3 text-center">
                            Precio Unitario
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            Cantidad Existente
                        </th>
                        <th scope="col" class="px-4 py-3 text-center">
                            Valor de Inventario
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            Ingresos Mes
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            Salidas Mes
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventarios as $index => $item)
                        @php
                            $now = \Carbon\Carbon::now();

                            $ingresos = $item
                                ->movimientos()
                                ->where('tipo_movimiento', 'Ingreso')
                                ->whereMonth('created_at', $now->month)
                                ->whereYear('created_at', $now->year)
                                ->sum('cantidad');

                            $egresos = $item
                                ->movimientos()
                                ->where('tipo_movimiento', 'Egreso')
                                ->whereMonth('created_at', $now->month)
                                ->whereYear('created_at', $now->year)
                                ->sum('cantidad');
                        @endphp
                        <tr
                        @if ($item->cantidad_actual < $item->cantidad_minima )
                           class="bg-white dark:bg-red-900 hover:bg-gray-50 dark:hover:bg-gray-600"
                           @else
                           class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600"
                        @endif >
                            <th scope="row"
                                class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{ $item->producto->codigo_producto }}
                            </th>
                            <td scope="row" class="px-6 py-2 text-sm text-gray-900  dark:text-white text-center">
                                {{ $item->producto->nombre_producto }}
                            </td>
                            <td class="px-6 py-2 text-center">
                                {{ $item->producto->proveedor->nombre_proveedor }}
                            </td>
                            <td class="px-5 py-2 text-center">
                                L. {{ $item->producto->total_isv }}
                            </td>
                            <td class="px-3 py-2 text-center">
                                {{ $item->cantidad_actual }}
                            </td>
                            <td class="px-4 py-2 text-center">
                                L. {{ $item->producto->total_isv * $item->cantidad_actual }}
                            </td>
                            <td class="px-3 py-2 text-center">
                                {{ $ingresos }}
                            </td>
                            <td class="px-3 py-2 text-center">
                                {{ $egresos }}
                            </td>
                            <td class="px-6 py-2 text-center flex gap-2">
                            @can('Gestionar Inventarios')
                                <a href="{{ route('inventarios.detalles', $item->id) }}">
                                    <button data-tooltip-target="tooltip-detalles-{{ $item->id }}" type="button"
                                        class="w-full md:w-auto text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <path fill="#ffffff"
                                                d="M20 3H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m-9 14H5v-2h6zm8-4H5v-2h14zm0-4H5V7h14z" />
                                        </svg>
                                    </button>
                                </a>


                                <button data-tooltip-target="tooltip-movimientos-{{ $item->id }}" type="button"
                                    wire:click.prevent="abrirMovimientos({{ $item->id }})"
                                    class="w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 48 48">
                                        <g fill="#ffffff">
                                            <path
                                                d="M27.707 6.293a1 1 0 0 1 0 1.414L25.414 10l2.293 2.293a1 1 0 0 1-1.414 1.414L24 11.414l-2.293 2.293a1 1 0 1 1-1.414-1.415L22.586 10l-2.293-2.293a1 1 0 1 1 1.415-1.414L24 8.586l2.293-2.293a1 1 0 0 1 1.414 0m-8.509 26.435A3.5 3.5 0 0 0 23 31.64v10.383L11 37.5v-7.504z" />
                                            <path fill-rule="evenodd"
                                                d="m37 37.5l-12 4.523V31.64a3.5 3.5 0 0 0 3.802 1.088L37 29.996zm-3.684-2.051a1 1 0 0 0-.632-1.898l-4.5 1.5a1 1 0 0 0 .632 1.898zm-8.989-20.394a1 1 0 0 0-.654 0l-12.998 4.5l-.023.007a1 1 0 0 0-.442.325l-3.99 4.988a1 1 0 0 0 .464 1.574l13.5 4.5a1 1 0 0 0 1.135-.376L24 26.743l2.68 3.83a1 1 0 0 0 1.136.376l13.5-4.5a1 1 0 0 0 .465-1.574l-3.99-4.988a1 1 0 0 0-.466-.333zM24 23.942l9.943-3.442L24 17.058L14.057 20.5z"
                                                clip-rule="evenodd" />
                                        </g>
                                    </svg>
                                </button>
                                 @endcan
                            </td>
                        </tr>
                        <div id="tooltip-detalles-{{ $item->id }}" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-900">
                            Detalles
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <div id="tooltip-movimientos-{{ $item->id }}" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-900">
                            Ingresar/Sacar
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            @if ($inventarios->hasPages())
                <div class="mt-4">
                    {{ $inventarios->links() }}
                </div>
            @endif
        </div>
    @endif



    {{-- @include('livewire.categoria-productos.crear') --}}

    @if ($modal)
        @include('livewire.inventarios.movimientos')
    @endif

    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>
</div>
<script>
    window.addEventListener('cerrar-modal', () => {
        document.getElementById('my_modal_2')?.close();
    })
</script>
