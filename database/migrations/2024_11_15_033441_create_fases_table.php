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
        Schema::create('fases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre'); // Nombre de la fase
            $table->text('descripcion')->nullable(); // Descripción de la fase
            $table->foreignId('proyecto_id')->constrained()->onDelete('cascade'); // Relación con proyecto
            $table->integer('orden')->nullable(); // Orden de la fase dentro del proyecto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fases');
    }
};
