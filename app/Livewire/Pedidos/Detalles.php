<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use App\Models\Pedido\Pedido;
use App\Models\Pedido\DetallePedido;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Collection;

class Detalles extends Component
{
    public $id;
    public $pedido;
    public $numero_pedido;
    public $observacion_pedido;
    public $proveedor_id;
    public $usuario_id;
    public $nombre_proveedor;
    public $user;

    public $query = '';
    public $productosPedidos = [];
    public $totalDetalle = 0;

    public function mount($id)
    {
        $this->id = $id;
        $this->user = Auth::user();
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
        $this->totalDetalle = $detalle_pedidos->sum('subtotal');

        return view('livewire.pedidos.detalles');
    }


    public function eliminar()
    {
        try {
            $this->pedido->delete();

            redirect()->route('pedidos.index');
            session()->flash('success', 'Pedido eliminado exitosamente.');
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al eliminar el pedido: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al eliminar el pedido.');
        }
    }

    public function aprobar()
    {
        try {
            $this->pedido->update([
                'estado_pedido' => 'Aprobado',
                'estado_entrega' => 'Pendiente',
                'fecha_respuesta' => now(),
                'respondido_por' => $this->user->nombre_usuario,
            ]);

            redirect()->route('pedidos.detalles', $this->id);
            session()->flash('success', 'Pedido aprobado exitosamente.');
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al aprobar el pedido: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al aprobar el pedido.');
        }
    }

    public function cancelar()
    {
        try {
            $this->pedido->update([
                'estado_pedido' => 'Cancelado',
                'fecha_respuesta' => now(),
                'respondido_por' => $this->user->nombre_usuario,
            ]);

            redirect()->route('pedidos.detalles', $this->id);
            session()->flash('success', 'Pedido cancelado exitosamente.');
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al cancelar el pedido: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al cancelar el pedido.');
        }
    }

    public function generarPDF()
    {
        $detalle_pedidos = DetallePedido::with('producto.unidad')
        ->where('pedido_id', $this->pedido->id)
        ->get();

        $total_productos = $detalle_pedidos->sum('subtotal');

        $html = View::make('pdf.pedidos-pdf-plantilla', [
            'numero_pedido' => $this->pedido->numero_pedido,
            'fecha_pedido' => $this->pedido->created_at->format('Y/m/d'),
            'nombre_proveedor' => $this->pedido->proveedor->nombre_proveedor,
            'numero_adjudicacion' => $this->pedido->proveedor->numero_adjudicacion,
            'estado_pedido' => $this->pedido->estado_pedido,
            'rtn_proveedor' => $this->pedido->proveedor->rtn,
            'telefono' => $this->pedido->proveedor->telefono,
            'detalle_pedido' => $this->productosPedidos,
            'nombre_completo' => $this->user->nombre . ' ' . $this->user->apellido,
            'dni' => $this->user->dni,
            'email' => $this->user->email ?? 'N/A',
            'nombre_usuario' => $this->user->nombre_usuario,
            'departamento' => $this->user->departamento->nombre_departamento,
            'telefono_usuario' => $this->user->telefono,
            'total_productos'   => $total_productos  
            
        ])->render();

        $pdfContent = Browsershot::html($html)
            ->showBackground()
            ->format('Letter')
            ->margins(0, 0, 0, 0)
            ->footerText('Página {{page}} de {{pages}}')
            ->footerFontSize(10)
            ->footerSpacing(5)
            ->pdf(); // Esto obtiene el contenido del PDF como string

        return response()->streamDownload(
            function () use ($pdfContent) {
                echo $pdfContent;
            },
            'Pedido_' . $this->pedido->numero_pedido . '.pdf',
            [
                'Content-Type' => 'application/pdf',
            ]
        );
    }
}
