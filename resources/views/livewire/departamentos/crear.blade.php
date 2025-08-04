<dialog id="my_modal_2" class="modal">
    <div class="modal-box bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md">
        <h3 class="text-lg font-bold mb-6">Crear Nuevo Departamento</h3>
        <form wire:submit.prevent="crear()" id="form">
            <div class="mb-6">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nombre de Categoría</label>
                <input type="text" id="first_name" wire:model="nombre_departamento"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Frutas" required />
                 @error('nombre_departamento')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    siglas</label>
                <textarea wire:model="siglas" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba la observación"></textarea>
                 @error('siglas')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Observación</label>
                <textarea wire:model="observacion" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba la observación"></textarea>
                 @error('observacion')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
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
