<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'status'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function owner() {
        return $this->belongsTo(User::class);
    }
}
