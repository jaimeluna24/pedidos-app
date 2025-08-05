<?php

namespace Database\Seeders;

use App\Models\Proveedor\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create([
            'rtn' => '08011999999',
            'nombre_proveedor' => 'Proveedor de Ejemplo',
            'telefono' => '1234-5678',
            'numero_adjudicacion' => 'ADJ-001',
            'tipo_adjudicacion_id' => 1, // Asumiendo que el ID 1 existe en la tabla tipo_adjudicaciones
            'tipo_proveedor_id' => 1, // Asumiendo que el ID 1 existe en la tabla tipo_proveedores
            'creador_id' => 1 // Asumiendo que el usuario con ID 1 existe
        ]);
    }
}
