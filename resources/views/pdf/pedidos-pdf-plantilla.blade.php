<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Documento PDF</title>
    <style>
        @page {
            margin: 0;
            padding-top: 1.5cm;
            padding-bottom: 1.8cm;
            background-size: 100%;
            background-repeat: no-repeat;
        }

        html,
        body {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            position: relative;
            text-align: justify;
            /* padding-bottom: 4cm; */
        }

        .contenido {
            z-index: 1;
            padding-left: 1.5cm;
            padding-right: 1.5cm;
        }

        .tabla-pdf {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .tabla-pdf th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .tabla-pdf td {
            padding: 8px;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        .tabla-pdf tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .tabla-pdf tr:hover {
            background-color: #f1f1f1;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .document-info {
            margin: 15px 0;
            text-align: center;
        }

        .document-info h1 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #003366;
        }

        .informacion-pedido {
            display: flex;
            width: 100%;
            justify-content: space-between;
            gap: 20px;
        }

        .info-part {
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: flex-start;
            width: 50%;
        }

        .info-part p {
            display: flex;
            justify-content: start;
            margin: 2px 0;
            line-height: 1.2;
            padding: 1px 0;
            font-size: 16px;

        }

        th {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    @php
    $imagePath = public_path('storage/images/OIP.png');
    $imageData = base64_encode(file_get_contents($imagePath));
    $src = 'data:image/png;base64,' . $imageData;
    @endphp

    <div class="contenido">
        <div style="display: flex; align-items: center; margin-bottom: 15px;">
    <div style="margin-right: 15px;">
        <img src="{{ $src }}" alt="Logo" style="height: 50px;">
    </div>
    <div>
        <h2 style="margin: 0; font-size: 18px;">Detalles del Pedido</h2>
        <p style="margin: 0; font-size: 12px; color: #555;">
            Generado el {{ date('d/m/Y') }}
        </p>
    </div>
</div>
</div>

        {{-- <img src="{{ public_path('storage\app\public\images\OIP.jpg') }}" 
         alt="Logo" 
         style="height: 50px; margin-right: 15px;"> --}}
        <div class="document-info" style="margin-bottom: 1cm">
            <h1>ORDEN DE PEDIDO</h1>
            <h1 style="margin-bottom: 1cm">{{ $numero_pedido }}</h1>

            <div class="informacion-pedido">
                <div class="info-part">
                    <p><strong>Fecha de Pedido: </strong> {{ $fecha_pedido }}</p>
                    <p><strong>Creador de Solicitud: </strong> {{ $nombre_completo }}</p>
                    <p><strong>Proveedor: </strong> {{ $nombre_proveedor }}</p>
                    <p><strong>N. Adjuticación: </strong> {{ $numero_adjudicacion }}</p>
                </div>
                <div class="info-part">
                    <p><strong>Estado de pedido: </strong> {{ $estado_pedido }}</p>
                    <p><strong>Departamento de Solicitud: </strong> {{ $departamento }}</p>
                    <p><strong>RTN Proveedor: </strong> {{ $rtn_proveedor }}</p>
                    <p><strong>Télefono: </strong> {{ $telefono }}</p>
                </div>
            </div>
            {{-- <div class="informacion-pedido">
                <div class="info-part">
                    <p><strong>DNI: </strong> {{ $dni }}</p>
                    <p><strong>Correo: </strong> {{ $email }}</p>
                </div>
                <div class="info-part">
                    <p><strong>Usuario: </strong> {{ $nombre_usuario }}</p>
                    <p><strong>Télefono: </strong> {{ $telefono_usuario }}</p>
                </div>
            </div> --}}
        </div>

        <div class="document-info">
            <h1>Detalles del Pedido</h1>
        </div>

        <table class="tabla-pdf">
            <thead>
                <tr>
                    <th width="6%">#</th>
                    <th width="12%">Código</th>
                    <th width="34%">Producto</th>
                    <th width="8%">UM</th>
                    <th width="12%">Precio</th>
                    <th width="12%">Cantidad</th>
                    <th width="15%" class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalle_pedido as $index => $item)
                <tr>
                    <td class="text-center">{{ $index+1 }}</td>
                    <td>{{ $item->producto->codigo_producto }}</td>
                    <td>{{ $item->producto->nombre_producto }}</td>
                    <td>{{ $item->producto->unidad->siglas }}</td>
                    <td>L. {{ $item->precio_unitario }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td class="text-right">L. {{ $item->subtotal }}</td>
                </tr>
                @endforeach
                
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-right" style="font-weight: bold;">
                        TOTAL
                    </td>
                    <td class="text-right" style="font-weight: bold;">
                        L. {{ number_format($total_productos, 2) }}
                    </td>
                </tr>
            </tfoot>
            
            {{-- <tfoot>
                <tr>
                    <td colspan="6" class="text-right"><strong>Total:</strong></td>
                    <td class="text-right"><strong>$4,481.25</strong></td>
                </tr>
            </tfoot> --}}
        </table>
        <div style="margin-top: 120px; text-align: center;">
            <div style="border-bottom: 1px solid #333; width: 300px; margin: 0 auto 8px auto; height: 2px;"></div>
            <div style="font-size: 14px; font-weight: bold; color: #333;">
                Firma y sello autorizado 
            </div>
        </div>


    </div>
</body>

</html>
