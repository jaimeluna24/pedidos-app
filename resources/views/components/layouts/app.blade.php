<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HGS - Pedidos') }}</title>
    @livewireStyles
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    {{-- <link rel="icon" type="image/jpg" href="{{ asset('images/favicon.ico') }}" /> --}}
    <link
        href="https://cdn.jsdelivr.net/combine/npm/daisyui@5/base/reset.css,npm/daisyui@5/base/svg.css,npm/daisyui@5/base/properties.css,npm/daisyui@5/base/rootscrollgutter.css,npm/daisyui@5/base/rootcolor.css,npm/daisyui@5/base/scrollbar.css,npm/daisyui@5/base/rootscrolllock.css,npm/daisyui@5/components/textarea.css,npm/daisyui@5/components/avatar.css,npm/daisyui@5/components/loading.css,npm/daisyui@5/components/diff.css,npm/daisyui@5/components/list.css,npm/daisyui@5/components/kbd.css,npm/daisyui@5/components/navbar.css,npm/daisyui@5/components/tab.css,npm/daisyui@5/components/fileinput.css,npm/daisyui@5/components/input.css,npm/daisyui@5/components/table.css,npm/daisyui@5/components/mockup.css,npm/daisyui@5/components/countdown.css,npm/daisyui@5/components/label.css,npm/daisyui@5/components/collapse.css,npm/daisyui@5/components/radialprogress.css,npm/daisyui@5/components/card.css,npm/daisyui@5/components/hero.css,npm/daisyui@5/components/dropdown.css,npm/daisyui@5/components/skeleton.css,npm/daisyui@5/components/radio.css,npm/daisyui@5/components/footer.css,npm/daisyui@5/components/tooltip.css,npm/daisyui@5/components/progress.css,npm/daisyui@5/components/filter.css,npm/daisyui@5/components/toggle.css,npm/daisyui@5/components/button.css,npm/daisyui@5/components/link.css,npm/daisyui@5/components/range.css,npm/daisyui@5/components/menu.css,npm/daisyui@5/components/modal.css,npm/daisyui@5/components/toast.css,npm/daisyui@5/components/breadcrumbs.css,npm/daisyui@5/components/chat.css,npm/daisyui@5/components/stat.css,npm/daisyui@5/components/indicator.css,npm/daisyui@5/components/divider.css,npm/daisyui@5/components/alert.css,npm/daisyui@5/components/validator.css,npm/daisyui@5/components/steps.css,npm/daisyui@5/components/status.css,npm/daisyui@5/components/carousel.css,npm/daisyui@5/components/mask.css,npm/daisyui@5/components/rating.css,npm/daisyui@5/components/drawer.css,npm/daisyui@5/components/dock.css,npm/daisyui@5/components/badge.css,npm/daisyui@5/components/stack.css,npm/daisyui@5/components/checkbox.css,npm/daisyui@5/components/calendar.css,npm/daisyui@5/components/swap.css,npm/daisyui@5/components/timeline.css,npm/daisyui@5/components/fieldset.css,npm/daisyui@5/components/select.css,npm/daisyui@5/utilities/radius.css,npm/daisyui@5/colors/properties.css,npm/daisyui@5/colors/states-extended.css,npm/daisyui@5/colors/responsive-extended.css,npm/daisyui@5/colors/states.css,npm/daisyui@5/colors/properties-extended.css,npm/daisyui@5/colors/responsive.css"
        rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a class="flex ms-2 md:me-24">
                        {{-- <img src="{{ asset('images/logo.png') }}" class="h-8 me-3" /> --}}
                        <span
                            class="self-center text-gray-600 text-lg font-semibold sm:text-2xl whitespace-nowrap dark:text-white">HGS
                            - Pedidos</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div>
                        <button id="theme-toggle" type="button"
                            class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#ffff"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg>
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300" role="none">
                                    {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}
                                </p>
                                <p class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300" role="none">
                                    {{ auth()->user()->nombre_usuario }}
                                </p>
                                <p class="text-sm mb-2 font-medium text-gray-900 dark:text-gray-300" role="none">
                                    {{ auth()->user()->departamento->nombre_departamento }}
                                </p>
                                <p class="text-sm mb-2 font-medium text-gray-900 truncate dark:text-gray-300"
                                    role="none">
                                    {{ auth()->user()->getRoleNames()->first() }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="{{ route('logOut') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Cerrar Sesión</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('inicio') }}"
                        class="flex items-center hover:text-gray-800 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                            {{ request()->routeIs('inicio') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }}
                             ">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ request()->routeIs('inicio') ? 'text-white dark:text-white hover:text-gray-200' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                @canany(['Ver Pedidos', 'Ver Entregas'])
                    <li>
                        <button type="button"
                            class="hover:text-gray-800 flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                        {{ request()->routeIs('pedidos.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }}
                         "
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white
                        {{ request()->routeIs('pedidos.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }}
                         "
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.275 20.25l3.475-3.45l-1.05-1.05l-2.425 2.375l-.975-.975l-1.05 1.075zM6 9h12V7H6zm12 14q-2.075 0-3.537-1.463T13 18t1.463-3.537T18 13t3.538 1.463T23 18t-1.463 3.538T18 23M3 22V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v6.675q-.7-.35-1.463-.513T18 11H6v2h7.1q-.425.425-.787.925T11.675 15H6v2h5.075q-.05.25-.062.488T11 18q0 1.05.288 2.013t.862 1.837L12 22l-1.5-1.5L9 22l-1.5-1.5L6 22l-1.5-1.5z" />
                            </svg>

                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pedidos</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            @can('Ver Pedidos')
                                <li>
                                    <a href="{{ route('pedidos.index') }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{ request()->routeIs('pedidos.index') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }}
                                 ">Lista
                                        de Pedidos</a>
                                </li>
                            @endcan
                            @can('Ver Entregas')
                                <li>
                                    <a href="{{ route('pedidos.entregas') }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{ request()->routeIs('pedidos.entregas.*') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }}
                                 ">Entregas</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @can('Ver Productos')
                    <li>
                        <a href="{{ route('productos.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700 group
                            {{ request()->routeIs('productos.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }}
                             ">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                            {{ request()->routeIs('productos.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }}
                             "
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <path fill="currentColor"
                                    d="M17 8h1v11H2V8h1V6c0-2.76 2.24-5 5-5c.71 0 1.39.15 2 .42A4.9 4.9 0 0 1 12 1c2.76 0 5 2.24 5 5zM5 6v2h2V6c0-1.13.39-2.16 1.02-3H8C6.35 3 5 4.35 5 6m10 2V6c0-1.65-1.35-3-3-3h-.02A4.98 4.98 0 0 1 13 6v2zm-5-4.22C9.39 4.33 9 5.12 9 6v2h2V6c0-.88-.39-1.67-1-2.22" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Productos</span>
                        </a>
                    </li>
                @endcan
                @can('Gestionar Inventarios')
                    <li>
                        <a href="{{ route('inventarios.index') }}"
                            class="hover:text-gray-800 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                        {{ request()->routeIs('inventarios.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }}
                         ">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                        {{ request()->routeIs('inventarios.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }}
                         "
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <g fill="none" fill-rule="evenodd">
                                    <path
                                        d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                    <path fill="currentColor" fill-rule="nonzero" d="M9 15v-1h1v1z" />
                                    <path fill="currentColor"
                                        d="M18 2a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm-7.5 10h-2A1.5 1.5 0 0 0 7 13.5v2A1.5 1.5 0 0 0 8.5 17h2a1.5 1.5 0 0 0 1.5-1.5v-2a1.5 1.5 0 0 0-1.5-1.5m5.5 1.5h-2a1 1 0 0 0-.117 1.993L14 15.5h2a1 1 0 0 0 .117-1.993zm-5.866-6.737L8.72 8.177l-.354-.354a1 1 0 1 0-1.414 1.414l.884.884a1.25 1.25 0 0 0 1.768 0l1.944-1.944a1 1 0 0 0-1.414-1.414M16 8h-2a1 1 0 0 0-.117 1.993L14 10h2a1 1 0 0 0 .117-1.993z" />
                                </g>
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Inventarios</span>
                        </a>
                    </li>
                @endcan
                @can('Gestionar Proveedores')
                    <li>
                        <a href="{{ route('proveedor.index') }}"
                            class="hover:text-gray-800 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                        {{ request()->routeIs('proveedor.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }}
                         ">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                        {{ request()->routeIs('proveedor.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }}
                         "
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21 1v22H3V1zm-4 12H7v2h10zm-2 4H7v2h8zM11 3H7v5.5l2-1.65l2 1.65z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Proveedores</span>
                        </a>
                    </li>
                @endcan
                @can('Gestionar Usuarios')
                    <li>
                        <a href="{{ route('usuarios.index') }}"
                            class="hover:text-gray-800 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                        {{ request()->routeIs('usuarios.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }}
                         ">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                        {{ request()->routeIs('usuarios.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }}"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Usuarios</span>
                        </a>
                    </li>
                @endcan
                @canany(['Gestionar Roles', 'Gestionar Permisos'])
                    <li>
                        <button type="button"
                            class="hover:text-gray-800 flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                        {{ request()->routeIs('seguridad.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }}"
                            aria-controls="dropdown-example-seguridad" data-collapse-toggle="dropdown-example-seguridad">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white
                        {{ request()->routeIs('seguridad.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }}"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 12h7c-.53 4.11-3.28 7.78-7 8.92zH5V6.3l7-3.11M12 1L3 5v6c0 5.55 3.84 10.73 9 12c5.16-1.27 9-6.45 9-12V5z" />
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Seguridad</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-example-seguridad" class="hidden py-2 space-y-2">
                            @can('Gestionar Roles')
                                <li>
                                    <a href="{{ route('seguridad.roles.index') }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{ request()->routeIs('seguridad.roles.index') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }}
                                 ">Roles</a>
                                </li>
                            @endcan
                            @can('Gestionar Permisos')
                                <li>
                                    <a href="{{ route('seguridad.permisos.index') }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{ request()->routeIs('seguridad.permisos.index') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }}
                                 ">Permisos</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                <li>
                    <a href="{{ route('logOut') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="hover:text-gray-800 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                        {{ request()->routeIs('logOut.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }}
                         "
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <g fill="currentColor">
                                <path d="M8.514 20h-4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h4v2h-4v12h4z" />
                                <path
                                    d="m13.842 17.385l1.42-1.408l-3.92-3.953h9.144a1 1 0 1 0 0-2h-9.162l3.98-3.947l-1.408-1.42l-6.391 6.337z" />
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Cerrar Sesión</span>
                    </a>
                    <form id="logout-form" action="{{ route('logOut') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                @canany(['Gestionar Departamentos', 'Gestionar Categoría de Productos'])
                    <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-gray-900
                        {{ request()->routeIs('mantenimientos.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }}
                         "
                            aria-controls="dropdown-example-1" data-collapse-toggle="dropdown-example-1">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white
                        {{ request()->routeIs('mantenimientos.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }}
                         "
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="#ffff" stroke="currentColor" stroke-width="2"
                                    d="M6 9a3 3 0 1 0 0-6a3 3 0 0 0 0 6Zm0-6V0m0 12V9M0 6h3m6 0h3M2 2l2 2m4 4l2 2m0-8L8 4M4 8l-2 2m16 2a3 3 0 1 0 0-6a3 3 0 0 0 0 6Zm0-6V3m0 12v-3m-6-3h3m6 0h3M14 5l2 2m4 4l2 2m0-8l-2 2m-4 4l-2 2m-5 8a3 3 0 1 0 0-6a3 3 0 0 0 0 6Zm0-6v-3m0 12v-3m-6-3h3m6 0h3M5 14l2 2m4 4l2 2m0-8l-2 2m-4 4l-2 2" />
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Mantenimiento</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="dropdown-example-1" class="hidden py-2 space-y-2">
                            @can('Gestionar Categoría de Productos')
                                <li>
                                    <a href="{{ route('mantenimientos.categorias.index') }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{ request()->routeIs('mantenimientos.categorias.*') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }}
                                 ">Categoría
                                        de Productos</a>
                                </li>
                            @endcan
                            @can('Gestionar Departamentos')
                                <li>
                                    <a href="{{ route('mantenimientos.departamentos.index') }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{ request()->routeIs('mantenimientos.departamentos.*') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }}
                                 ">Departamento</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
            </ul>
        </div>
    </aside>
    <div class="p-2 sm:ml-64">
        <div class="p-1 rounded-lg mt-14">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>


    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>

    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {


            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>
    <script>
        window.addEventListener('refresh', () => {
            setTimeout(() => {
                location.reload();
            }, 2000);
        });
    </script>
    <!-- PDF.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
    </script>
    <script src="{{ asset('node_modules/flowbite/dist/flowbite.min.js') }}"></script>

</body>

</html>
