<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoAdjudicacion extends Model
{
    use SoftDeletes;

    protected $table = 'tipo_adjudicaciones';

    protected $fillable = [
        'id',
        'nombre_tipo_adjudicacion',
        'observacion',

    ];
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
