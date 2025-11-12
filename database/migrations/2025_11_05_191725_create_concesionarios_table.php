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
        Schema::create('concesionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ubicacion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('marca')->nullable();
            $table->foreignId("jefe_id")->constrained('usuarios')->onDelete('cascade');
            $table->timestamps();
            $table->index(['marca', 'jefe_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concesionarios');
    }
};
