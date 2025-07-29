<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes;
    protected $table = 'departamentos';

    protected $fillable = [
        'id',
        'nombre_departamento',
        'siglas',
        'observacion'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'departamento_id');
    }
}
