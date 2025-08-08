<?php

namespace Database\Seeders;

use App\Models\Proveedor\Proveedor;
use App\Models\Proveedor\TipoAdjudicacion;
use App\Models\Proveedor\TipoProveedor;
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
            UnidadMedidaSeeder::class,
            CategoriaProductoSeeder::class,
            PermisosSeeder::class,
            TipoAdjudicacionSeeder::class,
            TipoProveedorSeeder::class,
            ProductoSeeder::class
        ]);


        $this->call([
            ProveedorSeeder::class
        ]);
    }
}
