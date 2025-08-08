<div>

    <section>
        {{-- Cards informativas --}}
        <div class="grid gap-6 md:grid-cols-4 p-4 ">
            {{-- Solicitudes --}}
            <div
                class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex w-full ">
                {{-- Información --}}
                <div class="text-gray-800 dark:text-white w-3/5 p-2">
                    <p class="text-xl font-bold">Pedidos</p>
                    <p class="text-xl">{{ $pedidos_totales }}</p>
                    <div class="flex flex-shrink gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <path fill="#059669"
                                d="M12 2c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2m4 15v-2H8v2zm0-7l-4-4l-4 4h2.5v4h3v-4z" />
                        </svg>
                        <p class="text-xs">
                            Registrados</p>
                    </div>
                </div>
                {{-- Icono --}}
                <div class="w-2/5 flex justify-center items-center p-2">
                    <div class="bg-yellow-200 rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 512 512">
                            <path fill="#eab308"
                                d="M464 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48M128 120c-22.091 0-40 17.909-40 40s17.909 40 40 40s40-17.909 40-40s-17.909-40-40-40m0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40s40-17.909 40-40s-17.909-40-40-40m0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40s40-17.909 40-40s-17.909-40-40-40m288-136v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12m0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12m0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12" />
                        </svg>
                    </div>
                </div>
            </div>
            {{-- Certificaciones --}}
            <div
                class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex w-full">
                {{-- Información --}}
                <div class="dark:text-white w-3/5 p-2 text-gray-800">
                    <p class="text-xl font-bold">Entregas</p>
                    <p class="text-xl">{{ $entregas_totales }}</p>
                    <div class="flex flex-shrink gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <path fill="#059669"
                                d="M12 2c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2m4 15v-2H8v2zm0-7l-4-4l-4 4h2.5v4h3v-4z" />
                        </svg>
                        <p class="text-xs">
                            Recibidas</p>
                    </div>
                </div>
                {{-- Icono --}}
                <div class="w-2/5 flex justify-center items-center p-2">
                    <div class="bg-blue-200 rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24">
                            <path fill="#0284c7"
                                d="M10.565 2.075c-.394.189-.755.497-1.26.928l-.079.066a2.56 2.56 0 0 1-1.58.655l-.102.008c-.662.053-1.135.09-1.547.236a3.33 3.33 0 0 0-2.03 2.029c-.145.412-.182.885-.235 1.547l-.008.102a2.56 2.56 0 0 1-.655 1.58l-.066.078c-.431.506-.74.867-.928 1.261a3.33 3.33 0 0 0 0 2.87c.189.394.497.755.928 1.26l.066.079c.41.48.604.939.655 1.58l.008.102c.053.662.09 1.135.236 1.547a3.33 3.33 0 0 0 2.029 2.03c.412.145.885.182 1.547.235l.102.008c.629.05 1.09.238 1.58.655l.079.066c.505.431.866.74 1.26.928a3.33 3.33 0 0 0 2.87 0c.394-.189.755-.497 1.26-.928l.079-.066c.48-.41.939-.604 1.58-.655l.102-.008c.662-.053 1.135-.09 1.547-.236a3.33 3.33 0 0 0 2.03-2.029c.145-.412.182-.885.235-1.547l.008-.102c.05-.629.238-1.09.655-1.58l.066-.079c.431-.505.74-.866.928-1.26a3.33 3.33 0 0 0 0-2.87c-.189-.394-.497-.755-.928-1.26l-.066-.079a2.56 2.56 0 0 1-.655-1.58l-.008-.102c-.053-.662-.09-1.135-.236-1.547a3.33 3.33 0 0 0-2.029-2.03c-.412-.145-.885-.182-1.547-.235l-.102-.008a2.56 2.56 0 0 1-1.58-.655l-.079-.066c-.505-.431-.866-.74-1.26-.928a3.33 3.33 0 0 0-2.87 0m5.208 6.617a.75.75 0 0 1 .168 1.047l-3.597 4.981a1.75 1.75 0 0 1-2.736.128l-1.506-1.72a.75.75 0 1 1 1.13-.989l1.505 1.721a.25.25 0 0 0 .39-.018l3.598-4.981a.75.75 0 0 1 1.048-.169" />
                        </svg>
                    </div>
                </div>
            </div>
            {{-- Solicitudes en espera --}}
            <div
                class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex w-full">
                {{-- Información --}}
                <div class="dark:text-white w-3/5 p-2 text-gray-800">
                    <p class="text-xl font-bold">Pedidos</p>
                    <p class="text-xl">{{ $pedidos_pendientes }}</p>
                    <div class="flex flex-shrink gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <path fill="#059669"
                                d="M12 2c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2m4 15v-2H8v2zm0-7l-4-4l-4 4h2.5v4h3v-4z" />
                        </svg>
                        <p class="text-xs">
                            Pendientes</p>
                    </div>
                </div>
                {{-- Icono --}}
                <div class="w-2/5 flex justify-center items-center p-2">
                    <div class="bg-gray-200 rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24">
                            <path fill="#666666"
                                d="M17 12c-2.76 0-5 2.24-5 5s2.24 5 5 5s5-2.24 5-5s-2.24-5-5-5m1.65 7.35L16.5 17.2V14h1v2.79l1.85 1.85zM18 3h-3.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H6c-1.1 0-2 .9-2 2v15c0 1.1.9 2 2 2h6.11a6.7 6.7 0 0 1-1.42-2H6V5h2v3h8V5h2v5.08c.71.1 1.38.31 2 .6V5c0-1.1-.9-2-2-2m-6 2c-.55 0-1-.45-1-1s.45-1 1-1s1 .45 1 1s-.45 1-1 1" />
                        </svg>
                    </div>
                </div>
            </div>
            {{-- Usuarios --}}
            <div
                class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex w-full">
                {{-- Información --}}
                <div class="dark:text-white w-3/5 p-2 text-gray-800">
                    <p class="text-xl font-bold">Productos</p>
                    <p class="text-xl">{{ $productos_totales }}</p>
                    <div class="flex flex-shrink gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <path fill="#059669"
                                d="M12 2c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2m4 15v-2H8v2zm0-7l-4-4l-4 4h2.5v4h3v-4z" />
                        </svg>
                        <p class="text-xs">
                            Registrados</p>
                    </div>
                </div>
                {{-- Icono --}}
                <div class="w-2/5 flex justify-center items-center p-2">
                    <div class="bg-violet-300 rounded p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 512 512">
                            <path fill="#4f46e5" fill-rule="evenodd"
                                d="m256 34.347l192 110.851v221.703L256 477.752L64 366.901V145.198zm-64.001 206.918L192 391.536l42.667 24.635V265.899zM106.667 192v150.267l42.666 24.635V216.633zm233.324-59.894l-125.578 72.836L256 228.952l125.867-72.669zM256 83.614l-125.867 72.67l41.662 24.052l125.579-72.835z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-gray-800 dark:text-gray-200 pl-4">
            <h1 class="text-xl font-bold border-b">
                Gráficos
            </h1>
        </div>
        <div class="grid gap-6 md:grid-cols-2 p-4 ">
            <div >
                <livewire:dashboard.bar-chart />
            </div>
            <div>
                <livewire:dashboard.donut-chart />
            </div>
        </div>

        <div class="flex w-full">
            <div class="w-2/4 p-4">
                <div class="bg-gray-50 dark:bg-gray-800 w-full p-6 rounded-md">
                    <div class="flex w-full justify-center text-gray-800 dark:text-gray-200 border-b mb-3">
                        <h1 class="text-xl font-bold ">
                            Productos con Stock Bajos
                        </h1>
                    </div>

                    <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700 ">
                        @forelse ($inventarios as $item)
                            <li class="pb-1 pt-1">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <div class="shrink-0 text-gray-800 dark:text-gray-200">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $item->producto->nombre_producto }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            Cantidad Actual: <span
                                                class="font-medium">{{ $item->cantidad_actual }}</span>
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base  font-semibold dark:text-white rounded-xl bg-blue-700 w-10 text-center justify-center">
                                        <a href="{{ route('inventarios.detalles', $item->id) }}">
                                            <button>Ver</button>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <div class="w-full flex justify-center">
                                <p class="text-gray-800 dark:text-gray-200 text-xl font-bold">
                                    Sin Datos
                                </p>
                            </div>
                        @endforelse

                    </ul>

                </div>

            </div>
            <div class="w-2/4 p-4">
                <div class="bg-gray-50 dark:bg-gray-800 w-full p-6 rounded-md">
                    <div class="flex w-full justify-center text-gray-800 dark:text-gray-200 border-b mb-3">
                        <h1 class="text-xl font-bold ">
                            Últimos Pedidos
                        </h1>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table
                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-fixed">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-[35%]">
                                        Núm. Pedido
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-[30%]">
                                        Estado
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-[22%]">
                                        Fecha
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-[18%]">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedidos as $item)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->numero_pedido }}
                                        </td>
                                        <td class="px-4 py-2 break-words">
                                             @switch($item->estado_pedido)
                                    @case('Aprobado')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">{{ $item->estado_pedido }}</span>
                                    @break

                                    @case('Cancelado')
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">{{ $item->estado_pedido }}</span>
                                    @break

                                    @case('Pendiente')
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-gray-300">{{ $item->estado_pedido }}</span>
                                    @break

                                    @default
                                @endswitch
                                        </td>
                                        <td class="px-4 py-2 w-[50%] ">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}

                                        </td>
                                        <td class="px-4 py-2 text-center">
                                            <div
                                                class="inline-flex items-center text-base font-semibold dark:text-white rounded-xl bg-blue-700 w-10 text-center justify-center">
                                                <a href="{{ route('pedidos.detalles', $item->id) }}">
                                                    <button>Ver</button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
