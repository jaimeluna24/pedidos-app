<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // User::factory(10)->create();
        $this->call([
            DepartamentoSeeder::class,
            CategoriaProductoSeeder::class,
            PermisosSeeder::class,
        ]);

        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Cliente']);

        $usuario = Usuario::create([
            'dni' => '0607200100129',
            'nombre' => 'Jaime David',
            'apellido' => 'Luna Ponce',
            'nombre_usuario' => 'JDLP24',
            'email' => 'jaimeluna600@gmail.com',
            'telefono' => '88461192',
            'password' => '12345678',
            'departamento_id' => 1
        ]);

        $usuario->assignRole('Administrador');
        $usuario->syncPermissions(Permission::all());
    }
}
