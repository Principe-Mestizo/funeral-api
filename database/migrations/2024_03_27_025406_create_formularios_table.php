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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->string('correo')->unique(); // Campo correo único
            $table->string('dni', 8)->nullable(); // Campo dni de máximo 8 caracteres
            $table->string('telefono')->unique()->nullable(); // Campo teléfono único
            $table->text('descripcion')->nullable(); // Campo descripción
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
