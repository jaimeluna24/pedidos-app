<?php

namespace App\Models\Proveedor;

use App\Models\Producto\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'id',
        'rtn',
        'nombre_proveedor',
        'telefono',
        'numero_adjudicacion',
        'tipo_adjudicacion_id',
        'tipo_proveedor_id',
        'creador_id'
    ];
    public function productos()
    {
        return $this->hasMany(Producto::class, 'proveedor_id');
    }

}
