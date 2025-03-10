<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
    Añadir un modelo Tarea, las tareas deben tener título, descripción y fecha de vencimiento.
    Tendrá una relación 1 a muchos, pudiendo un usuario tener 0 o más tareas y una tarea pertenecerá a un único usuario.
*/

class Tarea extends Model
{

    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'vencimiento'
    ];
    
    public function user () {
        return $this->belongsTo(User::class);
    }
}
