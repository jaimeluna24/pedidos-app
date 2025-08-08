<?php

namespace App\Livewire\Dashboard;

use App\Models\Inventario\Inventario;
use App\Models\Pedido\Pedido;
use App\Models\Pedido\PedidoEntrega;
use App\Models\Producto\Producto;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $pedidos_totales = Pedido::count();
        $entregas_totales = PedidoEntrega::count();
        $productos_totales = Producto::count();
        $pedidos_pendientes = Pedido::where('estado_pedido', 'Pendiente')->count();

        $inventarios = Inventario::with('producto')->orderBy('cantidad_actual', 'asc')->paginate(10);
        $pedidos = Pedido::orderBy('created_at', 'asc')->paginate(10);
        return view('livewire.dashboard.dashboard', compact('pedidos_totales', 'entregas_totales', 'productos_totales', 'pedidos_pendientes'), ['inventarios' => $inventarios, 'pedidos' => $pedidos]);
    }
}
