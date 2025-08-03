<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos App</title>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

</head>

<body class="bg-gray-900">
    <!-- https://play.tailwindcss.com/MIwj5Sp9pw -->
    <div class="pt-16">
        <div class="flex bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">

            <form method="POST" action="{{ route('loginUser') }}" class="w-full p-8 lg:w-1/2 text-gray-100">
                @csrf
                <h2 class="text-2xl font-semibold text-gray-300 text-center">HGS</h2>
                <p class="text-xl text-gray-300 text-center">Bienvenido</p>
                <div class="mt-4">
                    <label class="block text-gray-300 text-sm font-bold mb-2">Usuario</label>
                    <input name="nombre_usuario"
                        class="bg-gray-700 text-gray-400 focus:outline-none focus:shadow-outline border border-gray-700 rounded py-2 px-4 block w-full appearance-none"
                        type="text" placeholder="Escriba" required autofocus />
                    @if ($errors->has('nombre_usuario'))
                        <span class="text-danger">{{ $errors->first('nombre_usuario') }}</span>
                    @endif
                </div>
                <div class="mt-4">
                    <div class="flex justify-between">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Contraseña</label>
                        {{-- <a href="#" class="text-xs text-gray-500">Forget Password?</a> --}}
                    </div>
                    <input name="password"
                        class="bg-gray-700 text-gray-400 focus:outline-none focus:shadow-outline border border-gray-700 rounded py-2 px-4 block w-full appearance-none"
                        type="password" placeholder="Escriba" required />
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mt-8">
                    <button type="submit"
                        class="bg-gray-900 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-700">Ingresar</button>
                </div>
                {{-- <div class="mt-4 flex items-center justify-between">
                <span class="border-b w-1/5 md:w-1/4"></span>
                <a href="#" class="text-xs text-gray-500 uppercase">or sign up</a>
                <span class="border-b w-1/5 md:w-1/4"></span>
            </div> --}}
            </form>
        </div>
    </div>
</body>

</html>
