<?php

namespace Database\Seeders;

use App\Models\Producto\UnidadMedida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unidades = [
            ['nombre_unidad_medida' => 'BDN', 'siglas' => 'DBN'],
            ['nombre_unidad_medida' => 'Caja', 'siglas' => 'CAJ'],
            ['nombre_unidad_medida' => 'Libra', 'siglas' => 'LB'],
            ['nombre_unidad_medida' => 'Fardo', 'siglas' => 'FAR'],
            ['nombre_unidad_medida' => 'Quintal', 'siglas' => 'Q'],
            ['nombre_unidad_medida' => 'Unidad', 'siglas' => 'UD'],
            ['nombre_unidad_medida' => 'Docena', 'siglas' => 'DOC (12)'],
            ['nombre_unidad_medida' => 'Media Docena', 'siglas' => '1/2 DOC (6)'],
            ['nombre_unidad_medida' => 'Litro', 'siglas' => 'L'],
            ['nombre_unidad_medida' => 'Galón', 'siglas' => 'GAL'],
            ['nombre_unidad_medida' => 'Onza', 'siglas' => 'OZ'],
            ['nombre_unidad_medida' => 'Kilogramo', 'siglas' => 'KG'],
            ['nombre_unidad_medida' => 'Gramo', 'siglas' => 'G'],
            ['nombre_unidad_medida' => 'Mazo', 'siglas' => 'MAZO'],
            ['nombre_unidad_medida' => 'SCO', 'siglas' => 'SCO'],
            ['nombre_unidad_medida' => 'BT', 'siglas' => 'BT'],
            ['nombre_unidad_medida' => 'Bandeja', 'siglas' => 'BDJ'],
            ['nombre_unidad_medida' => 'Bolsa', 'siglas' => 'BOL'],



        ];

        foreach ($unidades as $item) {
            UnidadMedida::create($item);
        }
    }
}
