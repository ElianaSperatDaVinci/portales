<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog')->insert([
            [
                'blog_id' => 1001,
                'titulo' => 'Taylor Swift lanza su nuevo álbum "Evermore"',
                'fecha_publicacion' => '2022-05-10',
                'etiquetas' => 'Música, Taylor Swift, Evermore',
                'autor' => 'Admin',
                'contenido' => 'Taylor Swift sorprende a sus fans al lanzar su noveno álbum de estudio, titulado "Evermore". Este álbum, que sigue el éxito de su anterior trabajo "Folklore", presenta una colección de canciones íntimas y melódicas que exploran temas como el amor, la nostalgia y la fantasía. Los seguidores de Swift ya han comenzado a elogiar la profundidad lírica y la musicalidad única de este nuevo lanzamiento.',
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            [
                'blog_id' => 1002,
                'titulo' => '¡Taylor Swift en los Premios GRAMMY 2024!',
                'fecha_publicacion' => '2024-05-01',
                'etiquetas' => 'Taylor Swift, Premios GRAMMY, Música, Eventos',
                'autor' => 'Eliana Sperat',
                'contenido' => '¡Recomendaría que repasaras tu poesía, Taylor Nation!

                La Rubia de Vestido Brillante estaba toda vestida y contando los minutos para la medianoche mientras la Academia de Grabación entregaba los premios GRAMMY en el Crypto.com Arena en Las Vegas, Nevada, el pasado domingo 4 de febrero. Aquí, en la Agencia Swift, solo un chico que desearía nunca crecer, nos gustaría señalar una vez más que los GRAMMYS necesitan a la Encantadora mucho más de lo que ella los necesita.
                
                La Siempre y Para Siempre Audaz también anunció un nuevo álbum, El Departamento de Poetas Torturados, que se lanzará el 19 de abril de este año. Aún no se sabe si eso tiene alguna relación con nuestros amigos ladrones de pasteles del Departamento Ninja. Cuando se les buscó para hacer comentarios, no estaban en ninguna parte.
                
                ¡Próximamente en el Calendario!
                
                4 de febrero: Taylor Swift gana tanto el mejor Álbum Vocal Pop como el Álbum del Año por Midnights en los Premios GRAMMY de la Academia de Grabación 2024.
                19 de abril: Se lanza La Sociedad de Poetas Torturados.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'blog_id' => 1003,
                'titulo' => 'Los MTV VMAs de Taylor Swift en 2023',
                'fecha_publicacion' => '2023-09-17',
                'autor' => 'Eliana Sperat',
                'contenido' => 'Soy el problema.

                Siempre es agradable cuando Taylor tiene una divertida noche de premios, pero esta fue básicamente el show de Taylor de principio a fin. Lo siento pero no lo siento por todos los que tuvieron que soportarlo. La Rubia con la Guitarra Brillante no solo ganó, sino que se llevó todos los premios de la estantería. Ha pasado un tiempo desde que ha tenido una racha como esta.

                Video del Año por "Anti-Hero".
                Artista del Año.
                Canción del Año por "Anti-Hero".
                Mejor Pop por "Anti-Hero".
                Mejor Dirección por "Anti-Hero".
                Mejor Cinematografía por "Anti-Hero".
                Mejores Efectos Visuales por "Anti-Hero".
                Show del Verano. Este es nuevo, así que asumo que es para el Tour de las Eras.
                Álbum del Año por Midnights.
                Tuvo un momento de fangirl cuando le entregaron el Premio al Mejor Video Pop por un raro reencuentro de NSYNC.',

                'etiquetas' => 'Taylor Swift, MTV VMAs, Premios, Música, Video Musical, Entretenimiento, Cultura pop, NSYNC',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
