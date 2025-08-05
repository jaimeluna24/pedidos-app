<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
USE App\Models\Usuario\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departamento::insert([
            [
            'nombre_departamento' => 'Administración',
            'siglas' => 'ADM',
            'observacion' => 'N/A'
            ],
            [
            'nombre_departamento' => 'Almacen ',
            'siglas' => 'ALM',
            'observacion' => 'N/A'
            ],
            [
            'nombre_departamento' => 'Contabilidad',
            'siglas' => 'CON',
            'observacion' => 'N/A'
            ],
            [
            'nombre_departamento' => 'Finanzas',
            'siglas' => 'FIN',
            'observacion' => 'N/A'
            ],
            [
            'nombre_departamento' => 'Logística',
            'siglas' => 'LOG',
            'observacion' => 'N/A'
            ]
        ]);
    }
}
