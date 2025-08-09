<div>
    <x-alerts.success-alert />
    <x-alerts.error-alert />

    <div class="relative overflow-x-auto  border-b mb-2 p-4">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-1 sm:space-y-0 items-center justify-between ">
            <div class="flex items-center gap-8">
                <div class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Cambiar Contraseña
                </div>
            </div>
        </div>
    </div>

    <form action="" wire:submit.prevent="cambiar()" class="w-full flex justify-center">

        <div class="w-1/2">
            <div class="p-4">
                <p class="text-md text-gray-900 dark:text-white mb'10">
                    Por Seguridad se le solicitara cambiar la contraseña en el primer ingreso al sistema
                </p>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-1 p-4">
                <div>
                    <label for="first_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña Actual</label>
                    <input wire:model="password_actual" type="password" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba su actual contraseña" minlength="8" autocomplete="off"
                        required />
                    @error('password_actual')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nueva
                        Contraseña</label>
                    <input wire:model="password_nueva" type="password" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Escriba su nueva contraseña" autocomplete="off" />
                    @error('password_nueva')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="w-full flex justify-between">
                <x-back-button ruta="inicio" label="Regresar" />
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar</button>
            </div>

        </div>

    </form>


    <div wire:loading>
        <livewire:loader :mensaje="'Cargando...'" />
    </div>
</div>
