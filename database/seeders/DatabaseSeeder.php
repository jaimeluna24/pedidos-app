<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario\Usuario;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DepartamentoSeeder::class,
            PermisosSeeder::class,
        ]);

        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Cliente']);

        $usuario = Usuario::create([
            'dni' => '0000000000000',
            'nombre' => 'Root',
            'apellido' => 'Root',
            'nombre_usuario' => 'Root',
            'email' => 'root@gmail.com',
            'telefono' => '11223344',
            'password' => '12345678',
            'departamento_id' => 1
        ]);

        $usuario->assignRole('Administrador');
        $usuario->syncPermissions(Permission::all());
        // User::factory(10)->create();
        $this->call([
            UnidadMedidaSeeder::class,
            CategoriaProductoSeeder::class,
            TipoAdjudicacionSeeder::class,
            TipoProveedorSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class
        ]);

    }
}
