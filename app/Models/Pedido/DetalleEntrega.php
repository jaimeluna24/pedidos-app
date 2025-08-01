<?php

namespace App\Models\Pedido;

use App\Models\Producto\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleEntrega extends Model
{
    use SoftDeletes;

    protected $table = 'detalle_entregas';

    protected $fillable = [
        'id',
        'producto_id',
        'pedido_entrega_id',
        'cantidad_recibida',
        'precio_unitario',
        'subtotal'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function entrega()
    {
        return $this->belongsTo(PedidoEntrega::class);
    }
}
