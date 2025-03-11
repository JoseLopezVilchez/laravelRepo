<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplo extends Model
{
    /** @use HasFactory<\Database\Factories\EjemploFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [ //determina qué datos se meten en la BDD en asignación masiva - no previene la modificación manual de cada elemento
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [ //determina qué campos NO se mostrarán al recuperar datos de la BDD para pasarlos a json
        'created_at', //created_at y updated_at los crea el método timestamps() que puedes ver en la migración
        'updated_at'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            //'string con nombre de la columna' => 'string con nombre del tipo'
        ];
    }

    public function ejemploTenedor () {
        return $this->belongsTo(EjemploTenedor::class);
    }
}
