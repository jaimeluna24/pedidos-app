<dialog id="my_modal_2" class="modal">
    <div class="modal-box bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md">
        <h3 class="text-lg font-bold mb-6">Crear nuevo rol</h3>
        <form wire:submit.prevent="crear()" id="form">
            <div class="mb-6">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nombre del rol</label>
                <input type="text" id="first_name" wire:model="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required />
            </div>
        </form>
        <div class="modal-action">
            <form>
                <button
                    class="bg-slate-600 px-4 py-2 rounded-md focus:bg-slate-800 hover:bg-slate-700">Cancelar</button>
                <button type="submit" form="form"
                    class="bg-green-600 px-4 py-2 rounded-md focus:bg-green-800 hover:bg-green-700 disabled:opacity-50 disabled:cursor-not-allowed">Guardar</button>
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
