<?php

namespace App\Models\Inventario;

use App\Models\Producto\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventario extends Model
{
    use SoftDeletes;

    protected $table = 'inventarios';

    protected $fillable = [
        'id',
        'producto_id',
        'cantidad_actual',
        'cantidad_minima',
        'fecha_ultimo_ingreso',
        'fecha_ultimo_egreso'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function movimientos()
    {
        return $this->hasMany(MovimientoInventario::class);
    }

}
