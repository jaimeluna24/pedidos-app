<?php

namespace App\Models\Producto;

use App\Models\Proveedor\Proveedor;
use App\Models\Usuario\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Pedido\DetallePedido;
use App\Models\Pedido\Pedido;
use App\Models\Pedido\PedidoEntrega;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = 'productos';

    protected $fillable = [
        'id',
        'codigo_producto',
        'nombre_producto',
        'uxc',
        'precio_base',
        'isv',
        'precio_isv',
        'total_isv',
        'categoria_producto_id',
        'proveedor_id',
        'unidad_medida_id',
        'creador_id'
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'categoria_producto_id');
    }

    public function unidad()
    {
        return $this->belongsTo(UnidadMedida::class, 'unidad_medida_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'creador_id');
    }

    public function detallesPedidos()
    {
        return $this->hasMany(DetallePedido::class);
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'detalle_pedidos')
            ->withPivot(['cantidad', 'precio_unitario', 'subtotal']);
    }

    public function entregas()
    {
        return $this->belongsToMany(PedidoEntrega::class, 'detalle_entregas')
            ->withPivot(['cantidad', 'precio_unitario', 'subtotal']);
    }
}
