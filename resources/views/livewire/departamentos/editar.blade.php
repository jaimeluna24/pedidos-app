<div id="modal-editar-detalle" tabindex="-1" aria-hidden="true"
     class="bg-opacity-60 bg-black overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full h-full flex justify-center items-center">

         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-800 w-2/5">
             <!-- Modal body -->
             <div class="mb-6 p-5">
                 <h3 class="text-lg font-bold mb-6 text-md text-gray-900 dark:text-white">Editar Departamento</h3>
                 <div class="mb-4">
                     <label for="first_name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">
                         Nombre de Departamento</label>
                     <input type="text" id="first_name" wire:model="nombre_departamento" value="{{ $nombre_departamento }}"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         placeholder="" required />
                           @error('nombre_departamento')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
                 </div>

                 <div class="mb-6">
                     <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                         Siglas</label>
                     <textarea wire:model="siglas" id="message" rows="4"
                         class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         placeholder="Escriba la siglas"></textarea>
                     @error('siglas')
                         <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                     @enderror
                 </div>


                 <div class="mb-6">
                     <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                         Observación</label>
                     <textarea wire:model="observacion" id="message" rows="4"
                         class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         placeholder="Escriba la observación"></textarea>
                     @error('observacion')
                         <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                     @enderror
                 </div>
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