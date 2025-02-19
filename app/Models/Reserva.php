<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'disco_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function disco()
    {
        return $this->belongsTo(Disco::class, 'disco_id');
    }
}
