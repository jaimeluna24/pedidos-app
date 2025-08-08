<div>
    <x-alerts.success-alert />
    <x-alerts.error-alert />

    <div class="relative overflow-x-auto  border-b mb-2 p-4">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-1 sm:space-y-0 items-center justify-between ">
            <div class="flex items-center gap-8">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Nueva Entrega de Pedido
                </div>
            </div>
        </div>
    </div>
    <div action="">
        <div class="grid gap-6 md:grid-cols-3 p-4">
            <form wire:submit.prevent="buscarPedido">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de
                    Pedido</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search" wire:model="numero_pedido"
                        class="block w-full mt-1 p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba" required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                    @error('numero_pedido')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </form>
            @if ($pedido && $pedido->estado_pedido == 'Aprobado')
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                        Referencia</label>
                    <select id="countries" wire:model.live="tipo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option selected disbaled>Seleccione</option>
                        <option value="Orden de Entrega">Orden de Entrega</option>
                        <option value="Factura">Factura</option>
                    </select>
                    @error('tipo')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                @if ($tipo == 'Factura' || $tipo == 'Orden de Entrega')
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            @if ($tipo == 'Factura')
                                Factura
                            @else
                                Orden de Entrega
                            @endif
                        </label>
                        <input wire:model.live="factura" type="text" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Escriba" minlength="3" required />
                        @error('factura')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
            @else
                @if ($pedido && $estado_pedido != 'Aprobado')
                    <div class="flex justify-center items-center p-0">
                        <div class="flex items-center p-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert">
                            <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Pedido Sin Aprobar</span>
                            </div>
                        </div>
                    </div>
                @endif

            @endif
        </div>
        @if ($detalle_pedido)
            <div class="p-4">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Detalles de Pedido
                </div>
                <div class="grid gap-6 md:grid-cols-3 p-4">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Proveedor
                        </label>
                        <input type="text" id="first_name" value="{{ $pedido->proveedor->nombre_proveedor }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Escriba" minlength="3" disabled />
                    </div>
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Creado Por
                        </label>
                        <input type="text" id="first_name"
                            value="{{ $pedido->usuario->nombre }} {{ $pedido->usuario->apellido }} | {{ $pedido->usuario->nombre_usuario }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Escriba" minlength="3" disabled />
                    </div>
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Aprobado Por
                        </label>
                        <input type="text" id="first_name" value="{{ $pedido->respondido_por }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Escriba" minlength="3" disabled />
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                            @foreach ($detalle_pedido as $item)
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
        @endif

        <div class="w-full flex justify-between">
            <x-back-button ruta="pedidos.index" label="Regresar" />
            @if ($tipo == 'Factura' || $tipo == 'Orden de Entrega')
                <div class="flex gap-4 justify-center items-center">
                    @if ($factura == null)
                        <div class="text-sm font-semibold text-red-900 dark:text-red-600">
                            Campo de factura u orden vacío
                        </div>
                    @endif
                    <button type="button" wire:click="siguiente()" @if ($factura == null) disabled @endif
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Siguiente</button>
                </div>
            @endif
        </div>
    </div>

    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>
</div>
