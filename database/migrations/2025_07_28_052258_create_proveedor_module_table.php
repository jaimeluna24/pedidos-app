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
        Schema::create('tipo_proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipo_proveedor')->unique();
            $table->text('observacion')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tipo_adjudicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tipo_adjudicacion')->unique();
            $table->text('observacion')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('rtn')->unique();
            $table->string('nombre_proveedor')->unique();
            $table->string('telefono')->unique();
            $table->string('numero_adjudicacion')->unique();
            $table->foreignId('tipo_adjudicacion_id')
                ->constrained('tipo_adjudicaciones');
            $table->foreignId('tipo_proveedor_id')
                ->constrained('tipo_proveedores');
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
        Schema::dropIfExists('tipo_proveedores');
        Schema::dropIfExists('tipo_adjudicaciones');
        Schema::dropIfExists('proveedores');
    }
};
