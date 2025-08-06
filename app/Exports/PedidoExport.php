<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class PedidoExport implements FromArray, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
    }

    protected $datos;
    protected $pedido;
    protected $fechaPedido;
    protected $fechaRecibido;

    public function __construct($datos, $pedido, $fechaPedido, $fechaRecibido)
    {
        $this->datos = $datos;
        $this->pedido = $pedido;
        $this->fechaPedido = $fechaPedido;
        $this->fechaRecibido = $fechaRecibido;
    }

    public function array(): array
    {
        return $this->datos;
    }

    public function headings(): array
    {
        return ['Nombre Principal', 'Unidad', 'Pedido Semana', 'Recibido Semana', 'Diferencia', 'Precio + ISV', 'Valor Según Pedido', 'Valor Según Recibido', 'Diferencia'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Insertar dos filas arriba
                $sheet->insertNewRowBefore(1, 2);

                // Datos personalizados arriba
                $sheet->setCellValue('A1', 'Pedido');
                $sheet->setCellValue('A2', $this->pedido);
                $sheet->setCellValue('C1', 'Fecha Pedido');
                $sheet->setCellValue('D1', $this->fechaPedido);
                $sheet->setCellValue('C2', 'Fecha Recibido');
                $sheet->setCellValue('D2', $this->fechaRecibido);

                // Estilos encabezados personalizados
                $sheet->getStyle('A1:D2')->getFont()->setBold(true);
                $sheet->getStyle('A1:D2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

                // Encabezado de tabla
                $sheet->getStyle('A3:I3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '4F81BD'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);



                // Bordes a la tabla
                $totalFilas = count($this->datos) + 3;
                $sheet->getStyle("A3:I$totalFilas")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);



                foreach (['F', 'G', 'H', 'I'] as $col) {
                    $sheet->getStyle("{$col}4:{$col}{$totalFilas}")
                        ->getNumberFormat()
                        ->setFormatCode('"L"#,##0.00');
                }

                foreach (range('A', 'I') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }

                $sheet->setAutoFilter("A3:I$totalFilas");
            }
        ];
    }
}
