<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    
    protected $fillable = [
        'nombre',
        'apellidos',
        'edad',
        'direccion',
        'birth_date',
        'image',
    ];


}
