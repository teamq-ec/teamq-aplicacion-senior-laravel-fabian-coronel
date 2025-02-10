<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
    //
    protected $fillable = ["titulo", "descripcion", "director", "genero","actores", "fecha_estreno", "image" ];
}
