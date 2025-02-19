<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discos')->insert([
            [
                'discos_id' => 1,
                'nombre' => 'Fearless (Taylor\'s Version)',
                'lanzamiento' => '2021-04-09',
                'precio' => 35,
                'genero' => null,
                'duracion' => 160,
                'cantidad_canciones' => 26,
                'imagen_portada' => null
                //'created_at' => now(),
                //'uploaded_at' => now()

            ],
            [
                'discos_id' => 2,
                'nombre' => 'RED (Taylor\'s Version)',
                'lanzamiento' => '2021-11-12',
                'precio' => 35,
                'genero' => null,
                'duracion' => 130,
                'cantidad_canciones' => 30,
                'imagen_portada' => null
                //'created_at' => now(),
                //'uploaded_at' => now()

            ],
            [
                'discos_id' => 3,
                'nombre' => 'Speak Now (Taylor\'s Version)',
                'lanzamiento' => '2023-07-07',
                'precio' => 35,
                'genero' => null,
                'duracion' => 104,
                'cantidad_canciones' => 23,
                'imagen_portada' => null
                //'created_at' => now(),
                //'uploaded_at' => now()

            ],
            [
                'discos_id' => 4,
                'nombre' => '1989 (Taylor\'s Version)',
                'lanzamiento' => '2023-10-27',
                'precio' => 35,
                'genero' => null,
                'duracion' => 77,
                'cantidad_canciones' => 21,
                'imagen_portada' => null
                //'created_at' => now(),
                //'uploaded_at' => now()

            ],
            [
                'discos_id' => 5,
                'nombre' => 'The Tortured Poets Department',
                'lanzamiento' => '2024-04-19',
                'precio' => 35,
                'genero' => null,
                'duracion' => 122,
                'cantidad_canciones' => 31,
                'imagen_portada' => null
                //'created_at' => now(),
                //'uploaded_at' => now()

            ],
        ]);

        DB::table('discos_have_generos')->insert([
            [
                'disco_fk' => 1,
                'genero_fk' => 1,
            ],
            [
                'disco_fk' => 1,
                'genero_fk' => 2,
            ],
            [
                'disco_fk' => 2,
                'genero_fk' => 2,
            ],
            [
                'disco_fk' => 3,
                'genero_fk' => 1,
            ],
            [
                'disco_fk' => 4,
                'genero_fk' => 3,
            ],
        ]);

    }
}
