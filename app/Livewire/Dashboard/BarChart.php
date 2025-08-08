<?php

namespace App\Livewire\Dashboard;

use App\Models\Pedido\DetalleEntrega;
use App\Models\Pedido\DetallePedido;
use App\Models\Pedido\Pedido;
use Livewire\Component;

class BarChart extends Component
{
    public $series = [];

    public function mount()
    {
        $this->generateChartData();
    }

    public function generateChartData()
    {
        $pedidos = Pedido::where('estado_pedido', 'Aprobado')->orderBy('id', 'desc')->paginate(10);
        $pedidosSubtotal = collect();
        $entregasSubtotal = collect();

        foreach ($pedidos as $item) {
            $label = $item->numero_pedido;

            $solicitudesCount = DetallePedido::where('pedido_id', $item->id)->sum('subtotal');

            $certificacionesCount = DetalleEntrega::join('pedido_entregas', 'detalle_entregas.pedido_entrega_id', '=', 'pedido_entregas.id')
                ->where('pedido_entregas.pedido_id', $item->id)
                ->sum('detalle_entregas.subtotal');

            $pedidosSubtotal->push(['x' => $label, 'y' => $solicitudesCount]);
            $entregasSubtotal->push(['x' => $label, 'y' => $certificacionesCount]);
        }

        $this->series = [
            [
                'name' => 'Valor Pedido',
                'color' => '#1A56DB',
                'data' => $pedidosSubtotal,
            ],
            [
                'name' => 'Valor Recibido',
                'color' => '#FDBA8C',
                'data' => $entregasSubtotal,
            ],
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.bar-chart');
    }
}
