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
                            class="self-center text-gray-600 text-lg font-semibold sm:text-2xl whitespace-nowrap dark:text-white">HGS - Pedidos</span>
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
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    {{-- {{ session('usuario_nombre') }} --}}
                                </p>
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    {{-- {{ session('usuario_correo') }} --}}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    {{-- Eres: {{ session('usuario_rol') }} --}}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                {{-- <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Log out</a>
                                </li> --}}
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
                        <a
                        {{-- href="{{ route('inicio') }}" --}}
                            class="flex items-center hover:text-gray-800 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                            {{-- {{ request()->routeIs('inicio') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }} --}}
                             ">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                            {{-- {{ request()->routeIs('inicio') ? 'text-white dark:text-white hover:text-gray-200' : '' }}" --}}
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
                    <li>
                        <a
                        {{-- href="{{ route('mis-solicitudes.index') }}" --}}
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700 group
                            {{-- {{ request()->routeIs('mis-solicitudes.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }} --}}
                             ">
                            <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                            {{-- {{ request()->routeIs('mis-solicitudes.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }} --}}
                             "
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2m2-2a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2zm0 3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2zm-6 4c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v6c0 .6-.4 1-1 1H8a1 1 0 0 1-1-1zm8 1v1h-2v-1zm0 3h-2v1h2zm-4-3v1H9v-1zm0 3H9v1h2z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Solicitudes</span>
                        </a>
                    </li>

                 <li>
                    <button type="button"
                        class="hover:text-gray-800 flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                        {{-- {{ request()->routeIs('tramites.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }} --}}
                         "
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">

                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white
                        {{-- {{ request()->routeIs('tramites.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }} --}}
                         "
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <path fill="currentColor"
                                d="M13.981 2H6.018s-.996 0-.996 1h9.955c0-1-.996-1-.996-1m2.987 3c0-1-.995-1-.995-1H4.027s-.995 0-.995 1v1h13.936zm1.99 1l-.588-.592V7H1.63V5.408L1.041 6C.452 6.592.03 6.75.267 8c.236 1.246 1.379 8.076 1.549 9c.186 1.014 1.217 1 1.217 1h13.936s1.03.014 1.217-1c.17-.924 1.312-7.754 1.549-9c.235-1.25-.187-1.408-.777-2M14 11.997c0 .554-.449 1.003-1.003 1.003H7.003A1.003 1.003 0 0 1 6 11.997V10h1v2h6v-2h1z" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Trámites</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a
                            {{-- href="{{ route('tramites.pendientes') }}" --}}
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{-- {{ request()->routeIs('tramites.pendientes') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }} --}}
                                 ">Pendientes</a>
                        </li>
                        <li>
                            <a
                            {{-- href="{{ route('providencias.index') }}" --}}
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{-- {{ request()->routeIs('providencias.*') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }} --}}
                                 ">Providencias</a>
                        </li>
                        <li>
                            <a
                            {{-- href="{{ route('tramites.finalizados') }}" --}}
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{-- {{ request()->routeIs('tramites.finalizados') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }} --}}
                                 ">Finalizados</a>
                        </li>
                    </ul>
                </li>
                 <li>
                    <button type="button"
                        class="hover:text-gray-800 flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                        {{ request()->routeIs('seguridad.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }}
                         "
                        aria-controls="dropdown-example-seguridad" data-collapse-toggle="dropdown-example-seguridad">


                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white
                        {{ request()->routeIs('seguridad.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }}
                         "
                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ffffff" d="M12 12h7c-.53 4.11-3.28 7.78-7 8.92zH5V6.3l7-3.11M12 1L3 5v6c0 5.55 3.84 10.73 9 12c5.16-1.27 9-6.45 9-12V5z"/></svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Seguridad</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example-seguridad" class="hidden py-2 space-y-2">
                        <li>
                            <a
                            href="{{ route('seguridad.roles.index') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{ request()->routeIs('seguridad.roles.index') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }}
                                 ">Roles</a>
                        </li>
                        <li>
                            <a
                            href="{{ route('seguridad.permisos.index') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{ request()->routeIs('seguridad.permisos.index') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }}
                                 ">Permisos</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a
                    {{-- href="{{ route('certificaciones.index') }}" --}}
                        class="hover:text-gray-800 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                        {{-- {{ request()->routeIs('certificaciones.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }} --}}
                         ">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                        {{-- {{ request()->routeIs('certificaciones.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }} --}}
                         "
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21 1v22H3V1zm-4 12H7v2h10zm-2 4H7v2h8zM11 3H7v5.5l2-1.65l2 1.65z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Certificaciones</span>
                    </a>
                </li>
                <li>
                    <a
                    {{-- href="{{ route('bitacora.index') }}" --}}
                        class="hover:text-gray-800 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                        {{-- {{ request()->routeIs('bitacora.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }} --}}
                         ">

                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                        {{-- {{ request()->routeIs('bitacora.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }} --}}
                         "
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M298.667 378.623c-13.637 3.51-27.934 5.376-42.667 5.376c-47.128 0-89.795-19.102-120.68-49.987l30.17-30.17c23.164 23.164 55.164 37.491 90.51 37.491c14.96 0 29.321-2.567 42.667-7.284zM85.333 213.333q.002 6.547.486 12.972l-32.486-32.476l-30.17 30.17l83.504 83.504l83.503-83.504l-30.17-30.17l-31.451 31.441c-.363-3.93-.549-7.912-.549-11.937c0-70.693 57.308-128 128-128s128 57.307 128 128c0 32.783-12.324 62.687-32.593 85.333h52.428c14.521-25.103 22.832-54.247 22.832-85.333c0-94.257-76.41-170.667-170.667-170.667S85.333 119.076 85.333 213.333m149.334 11.52V106.666h42.666v95.147l54.4 36.48l-23.466 35.413zm256 95.146v42.667H384v-42.667zm-128 0v42.667H320v-42.667zm128 106.667v-42.667H384v42.667zm-128-42.667v42.667H320v-42.667zm128 106.667v-42.667H384v42.667zm-128-42.667v42.667H320v-42.667z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Bitacora</span>
                    </a>
                </li>
                <li>
                    <a
                    {{-- href="{{ route('usuarios.index') }}" --}}
                        class="hover:text-gray-800 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                        {{-- {{ request()->routeIs('usuarios.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }} --}}
                         ">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                        {{-- {{ request()->routeIs('usuarios.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }}" --}}
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Usuarios</span>
                    </a>
                </li>
                <li>
                    <a
                    {{-- href="{{ route('roles.index') }}" --}}
                        class="hover:text-gray-800 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                        {{-- {{ request()->routeIs('roles.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }} --}}
                         ">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                        {{-- {{ request()->routeIs('roles.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }} --}}
                         "
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M15 21h-2a2 2 0 0 1 0-4h2v-2h-2a4 4 0 0 0 0 8h2Zm8-2a4 4 0 0 1-4 4h-2v-2h2a2 2 0 0 0 0-4h-2v-2h2a4 4 0 0 1 4 4" />
                            <path fill="currentColor"
                                d="M14 18h4v2h-4zm-7 1a6 6 0 0 1 .09-1H3v-1.4c0-2 4-3.1 6-3.1a8.6 8.6 0 0 1 1.35.125A5.95 5.95 0 0 1 13 13h5V4a2.006 2.006 0 0 0-2-2h-4.18a2.988 2.988 0 0 0-5.64 0H2a2.006 2.006 0 0 0-2 2v14a2.006 2.006 0 0 0 2 2h5.09A6 6 0 0 1 7 19M9 2a1 1 0 1 1-1 1a1.003 1.003 0 0 1 1-1m0 4a3 3 0 1 1-3 3a2.996 2.996 0 0 1 3-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Roles</span>
                    </a>
                </li>
                <li>
                    <a
                    {{-- href="{{ route('logout') }}" --}}
                        {{-- onclick="event.preventDefault(); document.getElementById('logout-form').submit();" --}}
                        class="hover:text-gray-800 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white
                        {{-- {{ request()->routeIs('logout.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }} --}}
                         "
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <g fill="currentColor">
                                <path d="M8.514 20h-4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h4v2h-4v12h4z" />
                                <path
                                    d="m13.842 17.385l1.42-1.408l-3.92-3.953h9.144a1 1 0 1 0 0-2h-9.162l3.98-3.947l-1.408-1.42l-6.391 6.337z" />
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
                    </a>
                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form> --}}
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-gray-900
                        {{-- {{ request()->routeIs('mantenimientos.*') ? 'bg-blue-500 text-white hover:bg-blue-600 dark:hover:bg-blue-600' : '' }} --}}
                         "
                        aria-controls="dropdown-example-1" data-collapse-toggle="dropdown-example-1">
                        <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white
                        {{-- {{ request()->routeIs('mantenimientos.*') ? 'text-white dark:text-white hover:text-gray-200' : '' }} --}}
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
                        <li>
                            <a
                            {{-- href="{{ route('mantenimientos.tipo-certificacion.index') }}" --}}
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{-- {{ request()->routeIs('mantenimientos.tipo-certificacion.*') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }} --}}
                                 ">Tipo
                                Certificación</a>
                        </li>
                        <li>
                            <a
                            {{-- href="{{ route('mantenimientos.firmas.index') }}" --}}
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{-- {{ request()->routeIs('mantenimientos.firmas.*') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }} --}}
                                 ">Firmas</a>
                        </li>
                        <li>
                            <a
                            {{-- href="{{ route('mantenimientos.estado-certificaciones.index') }}" --}}
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700
                                {{-- {{ request()->routeIs('mantenimientos.estado-certificaciones.*') ? 'bg-blue-400 text-white hover:bg-blue-500 dark:hover:bg-blue-500' : '' }} --}}
                                 ">Estado
                                Certificaciones</a>
                        </li>
                    </ul>
                </li>
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

</body>

</html>
