<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $fillable = [
        'name',
        'description',
        'price',
        'is_available',
        'quantity'
    ];
}
