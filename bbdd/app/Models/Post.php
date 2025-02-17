<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    //Relacion muchos a uno
    public function user() {
        return $this->belongsTo(User::class); //Relacion muchos a muchos sería con ->hasMany() en vez de belongsTo
    }

    
}
