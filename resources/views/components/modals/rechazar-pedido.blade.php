<dialog id="modal_cancelar" class="modal">
    <div class="modal-box bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md">
        <form wire:submit.prevent="cancelar()" id="form-cancelar">
            <div class="p-2 md:p-2 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class=" text-lg font-normal text-gray-500 dark:text-gray-400">¿Está seguro de cancelar el pedido?</h3>
            </div>
        </form>
        <div class="modal-action flex justify-center gap-8">
            <form class="gap-4">
                    <button type="submit" form="form-cancelar"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Aceptar</button>
                    <button
                    class="bg-slate-600 px-4 py-2 rounded-md focus:bg-slate-800 hover:bg-slate-700">Cancelar</button>
                </form>
        </div>

    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
         <div wire:loading>
<livewire:loader :mensaje="'Cargando...'" />
</div>
</dialog>
