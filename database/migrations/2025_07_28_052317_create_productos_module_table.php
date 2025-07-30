<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categoria_productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_categoria')->unique();
            $table->text('observacion')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('unidad_medidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_unidad_medida')->unique();
            $table->string('siglas');
            $table->text('observacion')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_producto')->unique();
            $table->string('nombre_producto');
            $table->integer('uxc')->nullable();
            $table->decimal('precio_base');
            $table->decimal('isv')->nullable();
            $table->decimal('precio_isv');
            $table->decimal('total_isv');
            $table->foreignId('categoria_producto_id')
                ->constrained('categoria_productos');
            $table->foreignId('unidad_medida_id')
                ->constrained('unidad_medidas');
            $table->foreignId('proveedor_id')
                ->constrained('proveedores');
            $table->foreignId('creador_id')
                ->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_productos');
        Schema::dropIfExists('unidad_medidas');
        Schema::dropIfExists('productos');
    }
};
