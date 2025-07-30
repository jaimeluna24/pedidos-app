<div>
    <x-alerts.success-alert />
    <x-alerts.error-alert />

    <div class="relative overflow-x-auto  border-b mb-2 p-4">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-1 sm:space-y-0 items-center justify-between ">
            <div class="flex items-center gap-8">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    @if($modo_vista) Detalles de Usuario @else Edición de Usuario @endif
                </div>
            </div>
            <div class="flex justify-end gap-4 w-full md:w-1/2">
                @if ($modo_vista)
                    <div class="gap-4">
                        <button type="button" wire:click="$set('modo_vista', false);"
                            class="w-full md:w-auto text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">Editar</button>
                        <button type="button" onclick="modal_eliminar.showModal()"
                            class="w-full md:w-auto text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Eliminar</button>
                    </div>
                @endif

            </div>

        </div>
    </div>

    <form action="" wire:submit.prevent="editar()">
        <div class="grid gap-6 mb-6 md:grid-cols-2 p-4">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DNI</label>
                <input wire:model="dni" type="text" id="first_name" value="{{ $dni }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="0000000000000" minlength="13" maxlength="13" pattern="^[^-\s]{13}$" required
                    @disabled($modo_vista) />
                @error('dni')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="first_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                <input wire:model="email" type="email" id="first_name" value="{{ $email }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="john@gmail.com" @disabled($modo_vista) />
                @error('email')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="first_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input wire:model="nombre" type="text" id="first_name" value="{{ $nombre }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Jhon" required minlength="3" @disabled($modo_vista) />
                @error('nombre')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="first_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                <input wire:model="apellido" type="text" id="first_name" value="{{ $apellido }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Flores" required minlength="3" @disabled($modo_vista) />
                @error('apellido')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de
                    Usuario</label>
                <input wire:model="nombre_usuario" type="phone" id="first_name" value="{{ $nombre_usuario }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="JhonFlores00" minlength="4" required @disabled($modo_vista) />
                @error('nombre_usuario')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="first_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                <input wire:model="telefono" type="text" id="first_name" value="{{ $telefono }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="89763451" minlength="8" maxlength="8" required @disabled($modo_vista) />
                @error('telefono')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
                <select id="countries" wire:model="departamento_id" value="{{ $departamento_id }}"
                    @disabled($modo_vista)
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option selected disabled>Seleccione</option>
                    @foreach ($departamentos as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre_departamento }}</option>
                    @endforeach
                </select>
                @error('departamento_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol de
                    Usuario</label>
                <select id="countries" wire:model="role_id" value="{{ $role_id }}" @disabled($modo_vista)
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option selected disabled>Seleccione</option>
                    @foreach ($roles as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="pl-6 pr-6">
            <div class="pl-4 mb-2">
                <label for="countries" class="block text-sm font-medium text-gray-900 dark:text-white">Permisos</label>
            </div>
            @if ($modo_vista)
                <div class="grid gap-6 mb-6 md:grid-cols-3 p-4 bg-gray-700 rounded-md">
                    @foreach ($permisos_seleccionados as $item)
                        <div class="flex items-center">
                            <input id="default-checkbox-{{ $item }}" type="checkbox"
                                value="{{ $item }}" wire:model="permisos_seleccionados"
                                @disabled($modo_vista)
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox-{{ $item }}"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-50">{{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="grid gap-6 mb-6 md:grid-cols-3 p-4 bg-gray-700 rounded-md">
                    @foreach ($permisos as $item)
                        <div class="flex items-center">
                            <input id="default-checkbox-{{ $item->id }}" type="checkbox"
                                value="{{ $item->name }}" wire:model="permisos_seleccionados"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox-{{ $item->id }}"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-50">{{ $item->name }}</label>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>

        <div class="w-full flex justify-between">
            <x-back-button ruta="usuarios.index" label="Regresar" />
            @if (!$modo_vista)
                <div>
                    <button type="button" wire:click="$set('modo_vista', 'true')"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Cancelar</button>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar</button>
                </div>
            @endif

        </div>
    </form>

    @include('components.modals.eliminar')

    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>
</div>
