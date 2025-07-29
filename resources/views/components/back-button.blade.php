@props([
    'ruta' => null,
    'param' => null,
    'label' => 'Regresar',
])

@php
    $url = $ruta ? ($param ? route($ruta, $param) : route($ruta)) : url()->previous();
@endphp

<div class="ml-4">
    <a href="{{ $url }}">
        <button type="button"
        class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 me-2 mb-2">
        <svg class="w-4 h-4 me-2 text-white dark:text-white" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 5H1m0 0 4 4M1 5l4-4" />
        </svg>
        {{ $label }}
        </button>
    </a>
</div>
