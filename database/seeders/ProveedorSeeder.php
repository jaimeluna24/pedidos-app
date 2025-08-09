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
            'rtn' => '08011999998',
            'nombre_proveedor' => 'Banasupro',
            'telefono' => '87654321',
            'numero_adjudicacion' => 'ADJ-002',
            'tipo_adjudicacion_id' => 1,
            'tipo_proveedor_id' => 1,
            'creador_id' => 1,

        ]);

        Proveedor::create([
            'rtn' => '08011999999',
            'nombre_proveedor' => 'Proveedor de Ejemplo',
            'telefono' => '12345678',
            'numero_adjudicacion' => 'ADJ-001',
            'tipo_adjudicacion_id' => 1,
            'tipo_proveedor_id' => 1,
            'creador_id' => 1,

        ]);

        Proveedor::insert([
            'rtn' => '08011999997',
            'nombre_proveedor' => 'La Gotita',
            'telefono' => '23456789',
            'numero_adjudicacion' => 'ADJ-003',
            'tipo_adjudicacion_id' => 2,
            'tipo_proveedor_id' => 1,
            'creador_id' => 1,


        ]);
        Proveedor::create([
            'rtn' => '08011999996',
            'nombre_proveedor' => 'Tamales y Más',
            'telefono' => '34567890',
            'numero_adjudicacion' => 'ADJ-004',
            'tipo_adjudicacion_id' => 2,
            'tipo_proveedor_id' => 1,
            'creador_id' => 1,

        ]);
    }
}
