<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            ['name' => 'Crear Pedidos'],
            ['name' => 'Ver Pedidos'],
            ['name' => 'Editar Pedidos'],
            ['name' => 'Eliminar Pedidos'],
            ['name' => 'Aprobar/Rechazar Pedidos'],
            ['name' => 'Registrar Entregas'],
            ['name' => 'Ver Entregas'],
            ['name' => 'Crear Productos'],
            ['name' => 'Ver Productos'],
            ['name' => 'Editar Productos'],
            ['name' => 'Eliminar Productos'],
            ['name' => 'Gestonar Inventarios'],
            ['name' => 'Gestionar Usuarios'],
            ['name' => 'Gestionar Categoría de Productos'],
            ['name' => 'Gestionar Departamentos'],
            ['name' => 'Gestionar Proveedores'],
            ['name' => 'Gestionar Roles'],
            ['name' => 'Gestionar Permisos'],
        ];

        foreach ($permisos as $permiso) {
            Permission::create($permiso);
        }
    }
}
