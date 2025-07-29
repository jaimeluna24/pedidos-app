<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;


class Usuario extends Model
{
    use HasRoles, SoftDeletes;
    protected $table = 'users';

    protected $fillable = [
        'id',
        'dni',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'nombre_usuario',
        'departamento_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
