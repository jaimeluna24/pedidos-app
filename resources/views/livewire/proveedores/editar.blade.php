<div id="modal-editar-detalle" tabindex="-1" aria-hidden="true"
     class="bg-opacity-60 bg-black overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full h-full flex justify-center items-center">

         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-800 w-2/5">
             <!-- Modal body -->
             <div class="mb-6 p-5">
                 <h3 class="text-lg font-bold mb-6 text-md text-gray-900 dark:text-white">Editar proveedor</h3>
                <div class="mb-4">
                     <label for="first_name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">
                         editar RTN</label>
                     <input type="text" id="first_name" wire:model="rtn" value="{{ $rtn }}"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         placeholder="" required />
                        @error('rtn')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                 </div>

                 <div class="mb-4">
                     <label for="first_name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">
                        editar RTN</label>
                     <input type="text" id="first_name" wire:model="nombre_proveedor" value="{{ $nombre_proveedor }}"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         placeholder="" required />
                           @error('nombre_proveedor')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                 </div>

                 <div class="mb-4">
                     <label for="first_name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">
                        editar telefono</label>
                     <input type="text" id="first_name" wire:model="telefono" value="{{ $telefono }}"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         placeholder="" required />
                           @error('telefono')
                     <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                 </div>

                 <div class="mb-4">
                     <label for="first_name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">
                        numero adjudicacion</label>
                     <input type="text" id="first_name" wire:model="numero_adjudicacion" value="{{ $numero_adjudicacion }}"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         placeholder="" required />
                           @error('numero_adjudicacion')
                     <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                 </div>
                 
            <div>
                <label for="first_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Tipo de adjudicación
                </label>

                <select id="tipo_adjudicacion_id" wire:model="tipo_adjudicacion_id"
                    @disabled($modo_vista ?? false)
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>

                    <option selected disabled>Seleccione</option>

                    @foreach ($proveedores as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->tipo_adjudicacion_id }}
                        </option>
                    @endforeach
                </select>

                @error('tipo_adjudicacion_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="first_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Tipo de proveedor
                </label>

                <select id="tipo_proveedor_id" wire:model="tipo_proveedor_id"
                    @disabled($modo_vista ?? false)
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>

                    <option selected disabled>Seleccione</option>

                    @foreach ($proveedores as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->tipo_proveedor_id }}
                        </option>
                    @endforeach
                </select>

                @error('tipo_proveedor_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        

                {{-- <div>
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tipo proveedor id</label>
                    <select id="countries" wire:model="tipo_proveedor_id" value="{{ $tipo_proveedor_id }}"
                        @disabled($modo_vista)
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option selected disabled>Seleccione</option>
                        @foreach ($tipo_proveedor_id as $item)
                            <option value="{{ $item->id }}">{{ $item->tipo_proveedor_id}}</option>
                        @endforeach
                    </select>
                    @error('tipo_proveedor_id')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>  --}}

                 {{-- <div>
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">creador id</label>
                    <select id="countries" wire:model="creador_id" value="{{ $creador_id }}"
                        @disabled($modo_vista)
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option selected disabled>Seleccione</option>
                        @foreach ($creador_id as $item)
                            <option value="{{ $item->id }}">{{ $item->creador_id}}</option>
                        @endforeach
                    </select>
                    @error('creador_id')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                 
             </div> --}}

            </div>
             <!-- Modal footer -->
             <div
                 class="flex items-center p-2 justify-end border-t border-gray-200 rounded-b dark:border-gray-600 gap-4">
                 <button type="button" wire:click="cerrarEditar()"
                     class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                 <button data-modal-hide="modal-editar-detalle" type="button" wire:click="editar()"
                     class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                     Guardar</button>
             </div>
         </div>
     </div>
 </div>