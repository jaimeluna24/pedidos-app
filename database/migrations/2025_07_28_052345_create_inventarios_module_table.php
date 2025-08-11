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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos');
            $table->decimal('cantidad_actual', 8, 2);
            $table->decimal('cantidad_minima');
            $table->dateTime('fecha_ultimo_ingreso')->nullable();
            $table->dateTime('fecha_ultimo_egreso')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('movimiento_inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventario_id')->constrained('inventarios');
            $table->string('tipo_movimiento');
            $table->decimal('cantidad', 8, 2);
            $table->string('referencia')->nullable();
            $table->unsignedBigInteger('entrega_id')->nullable();
            $table->foreign('entrega_id')->references('id')->on('pedido_entregas');
            $table->foreignId('usuario_id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
        Schema::dropIfExists('movimiento_inventarios');
    }
};
