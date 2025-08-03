<dialog id="my_modal_2" class="modal">
    <div class="modal-box bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-md">
        <h3 class="text-lg font-bold mb-6">Crear Nuevo proveedor</h3>
        <form wire:submit.prevent="crear()" id="form">

            <div class="mb-6">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    RTN</label>
                <input type="text" id="first_name" wire:model="rtn"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="escriba el RTN" required />
                 @error('rtn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nombre de de proveedor</label>
                <input type="text" id="first_name" wire:model="nombre_proveedor"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nombre proveedor" required />
                 @error('nombre_proveedor')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    telefono</label>
                <input type="text" id="first_name" wire:model="telefono"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="digite telefono" required />
                 @error('telefono')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Numero Adjudicacion</label>
                <input type="text" id="first_name" wire:model="numero_adjudicacion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="digite Numero Adjudicacion" required />
                 @error('numero_adjudicacion')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo adjudicacio ID</label>
                <select id="countries" wire:model="tipo_adjudicacion_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option selected disabled>Seleccione</option>
                    @foreach ($tipo_adjudicacion_id as $item)
                        <option value="{{ $item->id }}">{{ $item->tipo_adjudicacion_id }}</option>
                    @endforeach
                </select>
                @error('tipo_adjudicacion_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo adjudicacio ID</label>
                <select id="countries" wire:model="tipo_adjudicacion_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option selected disabled>Seleccione</option>
                    @foreach ($tipo_adjudicacion_id as $item)
                        <option value="{{ $item->id }}">{{ $item->tipo_adjudicacion_id }}</option>
                    @endforeach
                </select>
                @error('tipo_adjudicacion_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo proveedor ID</label>
                <select id="countries" wire:model="tipo_proveedor_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option selected disabled>Seleccione</option>
                    @foreach ($tipo_proveedor_id as $item)
                        <option value="{{ $item->id }}">{{ $item->tipo_proveedor_id }}</option>
                    @endforeach
                </select>
                @error('tipo_proveedor_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">creador ID</label>
                <select id="countries" wire:model="creador_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option selected disabled>Seleccione</option>
                    @foreach ($creador_id as $item)
                        <option value="{{ $item->id }}">{{ $item->creador_id }}</option>
                    @endforeach
                </select>
                @error('creador_id')
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