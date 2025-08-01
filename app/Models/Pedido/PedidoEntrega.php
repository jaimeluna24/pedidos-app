<?php

namespace App\Models\Pedido;

use App\Models\Producto\Producto;
use App\Models\Usuario\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoEntrega extends Model
{
    use SoftDeletes;

    protected $table = 'pedido_entregas';

    protected $fillable = [
        'id',
        'pedido_id',
        'num_factura',
        'tipo',
        'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'usuario_id');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_entregas')
            ->withPivot(['cantidad', 'precio_unitario', 'subtotal']);
    }
}
