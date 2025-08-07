<doctype html>
<head>
    
</head>
    
   <div class="bg-[url('/storage/app/public/images/0001-Hospital-del-sur.jpg')] bg-cover bg-center h-64">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <h1 class="text-4xl text-white font-bold">ERP</h1>
        <p class="text-white ">
            En el Hospital General del Sur, ubicado en la ciudad de Choluteca, la adecuada gestión de los recursos alimenticios y la administración de pedidos es 
            un componente esencial para garantizar un servicio eficiente, oportuno y de calidad a los pacientes y al personal hospitalario. Con el objetivo de optimizar estos procesos, se ha desarrollado un software 
            integral de gestión que incorpora módulos financieros, contables, de productos, pedidos y usuarios.
        </p>
        </div>
        <div>
            <h4 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">Optimizando cada recurso, garantizando cada servicio con <mark class="px-2 text-white bg-blue-600 rounded-sm dark:bg-blue-500">HGS</mark> La excelencia operativa comienza aqui</h4>
            <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">La revolución digital en la administración hospitalaria - Más que un software, una solución integral</p> 
        </div> 
    </div> 
    
<body>
    <section>
        {{-- < class="ax-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 mt-18"> --}}
            {{-- <img class="w-24 h-24 mb-4 rounded-full sm:mb-0 sm:mr-4" src="/storage/app/public/images/OIP.jpg" alt="Foto"> --}}
            {{-- <div>
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Nombre</h5>
                <p class="text-gray-700 dark:text-gray-300">Este es el texto al lado de la imagen pequeña.</p>
            </div> --}}
            
        
            <div class="flex items mt-30">
                <div class="bg-[url('/storage/app/public/images/OIP.jpg')] bg-no-repeat bg-left bg-[length:150px_150px] w-[140px] h-[140px]"></div>
                <div class="ml-4">
                    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Control administrativo hospitalario integral: registros seguros, procesos auditables y gestión eficiente de insumos,</p>
                    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">optimización de recursos, transparencia financiera y mejora continua en la administración de los pedidos.</p>
                </div>

    </section>
            
        <div class="flex flex-wrap justify-center gap-6 ">
            <div class="relative w-80">
    <input placeholder="Acerca de reportes" class="w-full p-4 border rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer" readonly onclick="toggleText(this)">
    <div class="hidden absolute top-full left-0 mt-2 w-full bg-white border rounded-lg shadow p-4 z-10">
      Reportes a un click de distancia, análisis de consumo y pedidos, tendencias de abastecimiento,
       reduciendo un 80% el tiempo de elaboración manual gracias al manejo de reportes digitales en formatos PDF.
    </div>
  </div>

  <!-- Caja 2 -->
  <div class="relative w-80">
    <input placeholder="Acerca de inventario"  class="w-full p-4 border rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer" readonly onclick="toggleText(this)">
    <div class="hidden absolute top-full left-0 mt-2 w-full bg-white border rounded-lg shadow p-4 z-10 ">
      Control preciso de inventario.
    </div>
  </div>

  <!-- Caja 3 -->
  <div class="relative w-80">
    <input placeholder="Transparencia" class="w-full p-4 border rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer" readonly onclick="toggleText(this)">
    <div class="hidden absolute top-full left-0 mt-2 w-full bg-white border rounded-lg shadow p-4 z-10">
      Todo queda registrado y auditado.
    </div>
  </div>

</div>
        </div>

    <script>
        function toggleText(input) {
            const hiddenText = input.nextElementSibling;
            hiddenText.classList.toggle('hidden');
        }
    </script>
</body>



  


 






    
    
    

    

