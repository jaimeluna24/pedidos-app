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
use App\Models\Inventario\Inventario;

class Crear extends Component
{
    public $incluye_isv = false;

    public $codigo_producto;
    public $nombre_producto;
    public $uxc;
    public $precio_base = 0;
    public $isv = 0;
    public $precio_isv = 0;
    public $total_isv;
    public $categoria_producto_id = 'Seleccione';
    public $proveedor_id = 'Seleccione';
    public $unidad_medida_id = 'Seleccione';

    public $cantidad_actual = 0;
    public $cantidad_minima = 0;

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
        $categorias = CategoriaProducto::all();
        $proveedores = Proveedor::all();
        $unidades = UnidadMedida::all();
        return view('livewire.productos.crear', ['categorias' => $categorias, 'proveedores' => $proveedores, 'unidades' => $unidades]);
    }

    public function crear()
    {
        try {
            $this->categoria_producto_id = ((int) $this->categoria_producto_id);
            $this->proveedor_id = ((int) $this->proveedor_id);
            $this->unidad_medida_id = ((int) $this->unidad_medida_id);

            $this->validate([
                'codigo_producto' => 'required|string|max:255|unique:productos,codigo_producto',
                'nombre_producto' => 'required|string|max:255',
                'total_isv' => 'required',
                // 'producto_id' => 'integer|unique:inventarios,producto_id'
            ]);

            $producto = Producto::create([
                'codigo_producto' => $this->codigo_producto,
                'nombre_producto' => $this->nombre_producto,
                'uxc' => $this->uxc,
                'precio_base' => $this->precio_base,
                'isv' => $this->isv,
                'precio_isv' => $this->precio_isv,
                'total_isv' => $this->total_isv,
                'categoria_producto_id' => $this->categoria_producto_id,
                'proveedor_id' => $this->proveedor_id,
                'unidad_medida_id' => $this->unidad_medida_id,
                'creador_id' => Auth::id()
            ]);

                Inventario::create([
                    'producto_id' => $producto->id,
                    'cantidad_actual' => $this->cantidad_actual,
                    'cantidad_minima' => $this->cantidad_minima
                ]);

            // $this->reset(['nombre_categoria', 'observacion']);

            session()->flash('success', 'Producto creado exitosamente.');

            return redirect()->route('productos.index');
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al crear el producto: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al crear el producto.');
        }
    }
}
