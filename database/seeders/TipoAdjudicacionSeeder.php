<?php

namespace Database\Seeders;

use App\Models\Proveedor\TipoAdjudicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoAdjudicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoAdjudicacion::create([
            [
                'nombre_tipo_adjudicacion' => 'Adjudicación Directa',
                'observacion' => 'Proceso de adjudicación sin licitación previa.',
            ],
            [
                'nombre_tipo_adjudicacion' => 'Licitación Pública',
                'observacion' => 'Proceso abierto a todos los interesados.',
            ],
            [
                'nombre_tipo_adjudicacion' => 'Contratación por Contrato Menor',
                'observacion' => 'Contratación sin concurso previo.',
            ]
        ]);
    }
}
