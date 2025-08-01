<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto\CategoriaProducto;
use App\Models\Producto\UnidadMedida;
use App\Models\Producto\Producto;
use App\Models\Proveedor\Proveedor;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class Detalles extends Component
{
    public $incluye_isv = true;
    public $modo_vista = true;


    public $producto;
    public $id;
    public $codigo_producto;
    public $nombre_producto;
    public $uxc;
    public $precio_base = 0;
    public $isv = 0;
    public $precio_isv = 0;
    public $total_isv;
    public $categoria_producto_id;
    public $proveedor_id;
    public $unidad_medida_id;

    public function mount($id)
    {
        $this->id = $id;
        $producto = Producto::find($id);
        $this->producto = $producto;

        $this->codigo_producto = $producto->codigo_producto;
        $this->nombre_producto = $producto->nombre_producto;
        $this->uxc = $producto->uxc;
        $this->precio_base = $producto->precio_base;
        $this->isv = $producto->isv;
        $this->precio_isv = $producto->precio_isv;
        $this->total_isv = $producto->total_isv;
        $this->categoria_producto_id = $producto->categoria_producto_id;
        $this->proveedor_id = $producto->proveedor_id;
        $this->unidad_medida_id = $producto->unidad_medida_id;
        if ($producto->isv > 0) {
            $this->incluye_isv = true;
        }
    }

    public function updated($property)
    {
        if (in_array($property, ['total_isv', 'isv'])) {
            $this->calcularISV();
        }
    }

    public function calcularISV()
    {
        if ($this->isv > 0 && $this->total_isv > 0) {
            $tasa = $this->isv / 100;
            $base = $this->total_isv / (1 + $tasa);
            $this->precio_isv = round($base * $tasa, 2);
            $this->precio_base = round($this->total_isv - $this->precio_isv, 2);
        } else {
            $this->precio_isv = 0;
        }
    }

    public function render()
    {
        if ($this->incluye_isv == false) {
            $this->isv = 0;
            $this->precio_base = 0;
            $this->incluye_isv = false;
            $this->calcularISV();
        }
        $categorias = CategoriaProducto::all();
        $proveedores = Proveedor::all();
        $unidades = UnidadMedida::all();
        return view('livewire.productos.detalles', ['categorias' => $categorias, 'proveedores' => $proveedores, 'unidades' => $unidades]);
    }

    public function editar()
    {
        try {
            $this->validate([
                'codigo_producto' => ['required', 'string', Rule::unique('productos', 'codigo_producto')->ignore($this->producto->id)],
                'nombre_producto' => ['required', 'string'],
                'total_isv' => ['required', 'string']
            ]);

            $this->producto->update([
                'codigo_producto' => $this->codigo_producto,
                'nombre_producto' => $this->nombre_producto,
                'uxc' => $this->uxc,
                'precio_base' => $this->precio_base,
                'isv' => $this->isv,
                'precio_isv' => $this->precio_isv,
                'total_isv' => $this->total_isv,
                'categoria_producto_id' => $this->categoria_producto_id,
                'proveedor_id' => $this->proveedor_id,
                'unidad_medida_id' => $this->unidad_medida_id
            ]);

            // $this->reset(['nombre_categoria', 'observacion']);

            session()->flash('success', 'Producto editado exitosamente.');

            $this->modo_vista = true;
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al editar el producto: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al editar el producto.');
        }
    }

    public function eliminar()
    {
        try {
            $this->producto->delete();

            redirect()->route('productos.index');
            session()->flash('success', 'Producto eliminado exitosamente.');
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al editar el producto: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al editar el producto.');
        }
    }
}
