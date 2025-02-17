<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status'
    ];

    protected $hidden = [
        'seller_id'
    ];

    public function seller() {
        return $this->belongsTo(User::class);
    }
}
