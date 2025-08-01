<?php

namespace App\Models\Pedido;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Proveedor\Proveedor;
use App\Models\Usuario\Usuario;
use App\Models\Producto\Producto;

class Pedido extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos';

    protected $fillable = [
        'id',
        'numero_pedido',
        'observacion_pedido',
        'proveedor_id',
        'creador_id',
        'estado_pedido',
        'respondido_por',
        'fecha_respuesta',
        'estado_entrega',
        'fecha_entrega',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'creador_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_pedidos')
            ->withPivot(['cantidad', 'precio_unitario', 'subtotal']);
    }
}
