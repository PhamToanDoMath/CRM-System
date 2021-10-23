<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class MenuGroup extends Model
{
    public $fillable = [
        'name',
    ];

    public function menuItems(){
        return $this->hasMany(Menu::class);
    }
}
