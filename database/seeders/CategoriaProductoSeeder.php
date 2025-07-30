<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto\CategoriaProducto;

class CategoriaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre_categoria' => 'Verduras y hortalizas', 'observacion' => 'Incluye vegetales frescos y de hoja'],
            ['nombre_categoria' => 'Frutas', 'observacion' => 'Frutas frescas y tropicales'],
            ['nombre_categoria' => 'Tubérculos y raíces', 'observacion' => 'Tubérculos como yuca, papa y camote'],
            ['nombre_categoria' => 'Granos y cereales', 'observacion' => 'Granos básicos y cereales procesados'],
            ['nombre_categoria' => 'Carnes rojas y blancas', 'observacion' => 'Res, cerdo, pollo y derivados'],
            ['nombre_categoria' => 'Pescados y mariscos', 'observacion' => 'Productos del mar y río'],
            ['nombre_categoria' => 'Lácteos', 'observacion' => 'Quesos, leche, yogur y similares'],
            ['nombre_categoria' => 'Embutidos y procesados', 'observacion' => 'Chorizo, salami, mortadela, etc.'],
            ['nombre_categoria' => 'Huevos y derivados', 'observacion' => 'Huevos y productos a base de huevo'],
            ['nombre_categoria' => 'Panadería y repostería', 'observacion' => 'Pan, galletas y productos de repostería'],
            ['nombre_categoria' => 'Bebidas', 'observacion' => 'Jugos, agua, café, suplementos líquidos'],
            ['nombre_categoria' => 'Condimentos y especias', 'observacion' => 'Sazonadores, especias secas y frescas'],
            ['nombre_categoria' => 'Salsas y aderezos', 'observacion' => 'Mayonesa, mostaza, ketchup y otros'],
            ['nombre_categoria' => 'Enlatados y conservas', 'observacion' => 'Alimentos enlatados o empacados'],
            ['nombre_categoria' => 'Productos en polvo o deshidratados', 'observacion' => 'Sopas, gelatinas, harinas, etc.'],
            ['nombre_categoria' => 'Aceites y grasas', 'observacion' => 'Aceite vegetal, manteca y margarina'],
            ['nombre_categoria' => 'Dieta especial / suplementos', 'observacion' => 'Ensure, Glucerna, NAN y similares'],
            ['nombre_categoria' => 'Utensilios y desechables alimenticios', 'observacion' => 'Botellones, servilletas, lavaplatos']
        ];

        foreach ($categorias as $categoria) {
            CategoriaProducto::create($categoria);
        }
    }
}
