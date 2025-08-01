<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use App\Models\Pedido\Pedido;
use App\Models\Pedido\DetallePedido;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class Detalles extends Component
{
    public $id;
    public $pedido;
    public $numero_pedido;
    public $observacion_pedido;
    public $proveedor_id;
    public $usuario_id;
    public $nombre_proveedor;

    public $query = '';
    public $productosPedidos = [];

    public function mount($id)
    {
        $this->id = $id;
        $pedido = Pedido::with('detalles')->find($id);
        $this->pedido = $pedido;
        $this->numero_pedido = $pedido->numero_pedido;
        $this->nombre_proveedor = $pedido->proveedor->nombre_proveedor;
        $this->observacion_pedido = $pedido->observacion_pedido ?? 'Sin Observación';
        $this->proveedor_id = $pedido->proveedor_id;
    }

    public function render()
    {
        $detalle_pedidos = DetallePedido::where('pedido_id', $this->pedido->id)
            ->whereHas('producto', function ($query) {
                $query->where('nombre_producto', 'like', '%' . $this->query . '%');
            })
            ->with('producto')
            ->get();

        $this->productosPedidos = $detalle_pedidos;
        return view('livewire.pedidos.detalles');
    }


     public function eliminar()
    {
        try {
            $this->pedido->delete();

            redirect()->route('pedidos.index');
            session()->flash('success', 'Producto eliminado exitosamente.');
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al editar el producto: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al editar el producto.');
        }
    }
}
