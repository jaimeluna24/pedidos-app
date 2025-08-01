<?php

namespace App\Models\Pedido;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Producto\Producto;

class DetallePedido extends Model
{
    use SoftDeletes;

    protected $table = 'detalle_pedidos';

    protected $fillable = [
        'id',
        'producto_id',
        'pedido_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }


}
