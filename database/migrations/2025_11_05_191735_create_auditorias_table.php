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
        Schema::create('auditorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auditor_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('concesionario_id')->constrained('concesionarios')->onDelete('cascade');
            $table->foreignId('jefe_id')->constrained('usuarios')->onDelete('cascade');
            $table->date('fecha');
            $table->timestamps();
            $table->index(['concesionario_id', 'fecha']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};
