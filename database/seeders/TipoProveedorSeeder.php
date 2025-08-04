<?php

namespace Database\Seeders;

use App\Models\Proveedor\TipoProveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoProveedor::create([
            [
                'nombre_tipo_proveedor' => 'Proveedor Nacional',
                'observacion' => 'Proveedor ubicado dentro del país.',
            ],
            [
                'nombre_tipo_adjudicacion' => 'Proveedor Internacional',
                'observacion' => 'Proveedor ubicado fuera del país.',
            ]
        ]);
    }
}
