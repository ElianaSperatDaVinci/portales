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
        Schema::table('users', function (Blueprint $table) {
            // Agrego la columna para la FK de roless
            $table->unsignedTinyInteger('role_fk');

            // Defino la FK para la columna
            $table->foreign('role_fk')
                // Defino el nombre de la PK que referenciamos
                ->references('role_id')
                // Y el nombre de la tabla donde está
                ->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
           $table->dropColumn('role_fk');
        });
    }
};
