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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_pedido')->unique();
            $table->string('observacion_pedido')->nullable();
            $table->foreignId('proveedor_id')->constrained('proveedores');
            $table->foreignId('creador_id')->constrained('users');
            $table->string('estado_pedido')->default('Pendiente');
            $table->string('respondido_por')->nullable();
            $table->dateTime('fecha_respuesta')->nullable();
            $table->string('estado_entrega')->nullable();
            $table->dateTime('fecha_entrega')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');;
            $table->foreignId('producto_id')->constrained('productos');
            $table->decimal('cantidad', 8, 2);
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 12, 2);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('pedido_entregas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');
            $table->string('num_factura')->nullable();
            $table->string('tipo');
            $table->foreignId('usuario_id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('detalle_entregas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('pedido_entrega_id')->constrained('pedido_entregas');
            $table->decimal('cantidad_recibida', 8, 2);
            $table->decimal('precio_unitario', 8, 2);
            $table->decimal('subtotal', 10, 2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('detalle_pedidos');
        Schema::dropIfExists('pedido_entregas');
        Schema::dropIfExists('detalle_entregas');
    }
};
