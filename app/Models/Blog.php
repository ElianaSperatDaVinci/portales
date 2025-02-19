<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $blog_id
 * @property string $titulo
 * @property string $fecha_publicacion
 * @property string $etiquetas
 * @property string $autor
 * @property string $contenido
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereAutor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereContenido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereEtiquetas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereFechaPublicacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $primaryKey = 'blog_id';

    protected $fillable = ['titulo', 'fecha_publicacion', 'etiquetas', 'autor', 'contenido'];

}
