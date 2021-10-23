<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Menu extends Model implements HasMedia
{
    use InteractsWithMedia;
    
    public $fillable = [
        'name',
        'description',
        'price',
        'is_available',
        'quantity'
    ];
}
