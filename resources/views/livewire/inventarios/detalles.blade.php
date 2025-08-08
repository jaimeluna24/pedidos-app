<div>
    <x-alerts.success-alert />
    <x-alerts.error-alert />

    <div class="relative overflow-x-auto  border-b mb-2 p-4">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-1 sm:space-y-0 items-center justify-between ">
            <div class="flex items-center gap-8">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Detalles de Inventario
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="grid gap-6 md:grid-cols-3 p-4">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código de
                    Producto</label>
                <input type="text" id="first_name" value="{{ $inventario->producto->codigo_producto }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled />
            </div>
            <div class="col-span-2">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de
                    Producto</label>
                <input type="text" id="first_name" value="{{ $inventario->producto->nombre_producto }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled />
            </div>
        </div>
        <div class="grid gap-6 md:grid-cols-3 p-4">
            <div>
                <label for="first_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Proveedor</label>
                <input type="text" id="first_name" value="{{ $inventario->producto->proveedor->nombre_proveedor }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled />
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria
                    de
                    Producto</label>
                <input type="text" id="first_name" value="{{ $inventario->producto->categoria->nombre_categoria }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled />
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unidad de
                    Medida</label>
                <input type="text" id="first_name" value="{{ $inventario->producto->unidad->nombre_unidad_medida }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled />
            </div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-5 p-4">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UXC</label>
                <input type="number" id="first_name" value="{{ $inventario->producto->uxc }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled />
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio
                    Base</label>
                <div class="relative">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-300">L.</span>
                    <input type="number" id="first_name" value="{{ $inventario->producto->precio_base }}"
                        class="pl-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISV</label>
                <div class="relative">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-300">%</span>
                    <input type="number" id="first_name" value="{{ $inventario->producto->isv }}"
                        class="pl-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor
                    Isv</label>
                <div class="relative">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-300">L.</span>
                    <input type="number" id="first_name" value="{{ $inventario->producto->precio_isv }}"
                        class="pl-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio
                    Unitario</label>
                <div class="relative">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-300">L.</span>
                    <input type="number" id="first_name" value="{{ $inventario->producto->total_isv }}"
                        class="pl-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        disabled />
                </div>
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad
                    Actual</label>
                <input type="number" id="first_name" value="{{ $inventario->cantidad_actual }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled />
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad
                    Mínima</label>
                <div class="flex items-center gap-3">
                    <input type="number" wire:model="nueva_cantidad_minima" id="first_name"
                        value="{{ $inventario->cantidad_minima }}" @if($modo_cantidad_minima == true) disabled @endif
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         />
                    @can('Gestionar Inventarios')
                    @if ($modo_cantidad_minima == false)
                        <button wire:click="guardarCantidadMinima()"
                            class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-green-300 rounded-full focus:outline-none hover:bg-green-100 focus:ring-4 focus:ring-green-200 dark:bg-green-800 dark:text-green-400 dark:border-green-600 dark:hover:bg-green-700 dark:hover:border-green-600 dark:focus:ring-green-700"
                            type="button">
                            <span class="sr-only">Quantity button guardar</span>

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="#ffffff"
                                    d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                            </svg>
                        </button>
                    @else
                        <button wire:click="$set('modo_cantidad_minima', false)"
                            class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-orange-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-orange-200 dark:bg-orange-800 dark:text-orange-400 dark:border-orange-600 dark:hover:bg-orange-700 dark:hover:border-orange-600 dark:focus:ring-orange-700"
                            type="button">
                            <span class="sr-only">Quantity button editar</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <g fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5">
                                    <path
                                        d="M19.09 14.441v4.44a2.37 2.37 0 0 1-2.369 2.369H5.12a2.37 2.37 0 0 1-2.369-2.383V7.279a2.356 2.356 0 0 1 2.37-2.37H9.56" />
                                    <path
                                        d="M6.835 15.803v-2.165c.002-.357.144-.7.395-.953l9.532-9.532a1.36 1.36 0 0 1 1.934 0l2.151 2.151a1.36 1.36 0 0 1 0 1.934l-9.532 9.532a1.36 1.36 0 0 1-.953.395H8.197a1.36 1.36 0 0 1-1.362-1.362M19.09 8.995l-4.085-4.086" />
                                </g>
                            </svg>
                        </button>
                    @endif
                    @endcan
                </div>

            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ultimo
                    Ingreso</label>
                <input type="text" id="first_name" value="{{ $inventario->fecha_ultimo_ingreso }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled />
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ultimo
                    Egreso</label>
                <input type="text" id="first_name" value="{{ $inventario->fecha_ultimo_egreso }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled />
            </div>
        </div>

        @if ($movimientos->isEmpty())
            <x-empty />
        @else
            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-3 py-3 text-center">
                                #
                            </th>
                            <th scope="col" class="px-12 py-3 text-center">
                                Movimientos
                            </th>
                            <th scope="col" class="px-10 py-3 text-center">
                                Cantidad
                            </th>
                            <th scope="col" class="px-10 py-3 text-center">
                                Referencia
                            </th>
                            <th scope="col" class="px-5 py-3 text-center">
                                Usuario
                            </th>
                            <th scope="col" class="px-4 py-3 text-center">
                                Fecha
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimientos as $index => $item)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                    {{ $index + 1 }}
                                </th>
                                <td scope="row"
                                    class="px-6 py-2 text-sm text-gray-900  dark:text-white text-center">
                                    {{ $item->tipo_movimiento }}
                                </td>
                                <td class="px-6 py-2 text-center">
                                    {{ $item->cantidad }}
                                </td>
                                <td class="px-6 py-2 text-center">
                                    {{ $item->entrega->pedido->numero_pedido ?? 'N/A' }}
                                </td>
                                <td class="px-5 py-2 text-center">
                                    L. {{ $item->usuario->nombre_usuario }}
                                </td>
                                <td class="px-3 py-2 text-center">
                                    {{ $item->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($movimientos->hasPages())
                    <div class="mt-4">
                        {{ $movimientos->links() }}
                    </div>
                @endif
            </div>
        @endif
    </div>
    <div class="w-full flex justify-between mt-3">
        <x-back-button ruta="inventarios.index" label="Regresar" />
    </div>


    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>
</div>
