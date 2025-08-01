<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use App\Models\Proveedor\Proveedor;
use App\Models\Pedido\Pedido;
use App\Models\Producto\Producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Crear extends Component
{
    public $numero_pedido;
    public $proveedor_id = 'Seleccione';


    public function mount()
    {
        $user = Auth::user();
        $anio = Carbon::now()->year;

        $departamento =  $user->departamento->nombre_departamento;
        $siglasDepartamento = $user->departamento->siglas;

        $siglasHospital = 'HGS';

        $contador = Pedido::whereYear('created_at', $anio)->count() + 1;

        $correlativo = str_pad($contador, 2, '0', STR_PAD_LEFT); // convierte 1 => 01, 2 => 02, etc.

        $codigo = "{$correlativo}-{$anio}-{$siglasDepartamento}-{$siglasHospital}";
        $this->numero_pedido = $codigo;
    }

    public function render()
    {
        $productos = collect();

        if ($this->proveedor_id) {
            $productos = Producto::where('proveedor_id', $this->proveedor_id)->paginate(1);
        }

        $proveedores = Proveedor::all();
        return view('livewire.pedidos.crear', ['proveedores' => $proveedores, 'productos' => $productos]);
    }
}
