<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @property int $discos_id
 * @property string $nombre
 * @property string $lanzamiento
 * @property int $precio
 * @property string $genero
 * @property int $duracion
 * @property int $cantidad_canciones
 * @property string $imagen_portada
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Disco newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disco newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disco query()
 * @method static \Illuminate\Database\Eloquent\Builder|Disco whereCantidadCanciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disco whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disco whereDiscosId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disco whereDuracion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disco whereGenero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disco whereImagenPortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disco whereLanzamiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disco whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disco wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disco whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Disco extends Model
{
    use HasFactory;

    protected $table = 'discos';

    protected $primaryKey = 'discos_id';

    protected $fillable = ['nombre', 'lanzamiento', 'precio', 'genero', 'duracion', 'cantidad_canciones', 'imagen_portada'];

    protected function price():Attribute
    {
        return Attribute::make();
    }

    public function generos(): BelongsToMany
    {
        return $this->belongsToMany(Genero::class,
            'discos_have_generos',
            'disco_fk',
            'genero_fk',
            'discos_id',
            'genero_id'
        );
    }

    public function reservas()
    {
        return $this->belongsTo(Disco::class, 'disco_id');
    }
}
