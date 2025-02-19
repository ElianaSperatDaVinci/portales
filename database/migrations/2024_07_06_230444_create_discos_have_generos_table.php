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
        Schema::create('discos_have_generos', function (Blueprint $table) {
            
            $table->foreignId('disco_fk')->constrained(table: 'discos', column: 'discos_id');
            $table->unsignedSmallInteger('genero_fk');
            
            $table->foreign('genero_fk')->references('genero_id')->on('generos');

            $table->primary(['disco_fk', 'genero_fk']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discos_have_generos');
    }
};
