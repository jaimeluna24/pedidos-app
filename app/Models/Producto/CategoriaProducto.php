<?php

namespace App\Models\Producto;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaProducto extends Model
{
    use SoftDeletes;

    protected $table = 'categoria_productos';

    protected $fillable = [
        'id',
        'nombre_categoria',
        'observacion'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_producto_id');
    }
}
