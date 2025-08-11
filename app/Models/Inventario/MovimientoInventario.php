<?php

namespace App\Models\Inventario;

use App\Models\Pedido\PedidoEntrega;
use App\Models\Usuario\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovimientoInventario extends Model
{
    use SoftDeletes;

    protected $table = 'movimiento_inventarios';

    protected $fillable = [
        'id',
        'inventario_id',
        'tipo_movimiento',
        'cantidad',
        'referencia',
        'entrega_id',
        'usuario_id'
    ];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }

     public function entrega()
    {
        return $this->belongsTo(PedidoEntrega::class, 'entrega_id');
    }

     public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
