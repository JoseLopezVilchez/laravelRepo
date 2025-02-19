<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    protected $fillable = [
        'name',
        'region'
    ];

    //relacion uno a muchos
    function users () {
        return $this->hasMany(User::class);
    }
}
