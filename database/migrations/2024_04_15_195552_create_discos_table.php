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
        Schema::create('discos', function (Blueprint $table) {
            $table->id('discos_id');
            $table->string('nombre', 100);
            $table->date('lanzamiento');
            $table->integer('precio')->unsigned();
            $table->string('genero', 50)->nullable();
            $table->integer('duracion');
            $table->unsignedInteger('cantidad_canciones');
            $table->string('imagen_portada')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discos');
    }
};
