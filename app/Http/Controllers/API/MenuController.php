<?php

namespace App\Http\Controllers\API;

use App\Models\Menu;
use App\Http\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Http\Resources\MenuCollection;

class MenuController extends Controller
{
    public function index(){
        return MenuResource::collection(Menu::all());
    }
    public function show($id){
        return new MenuResource(Menu::find($id));
    }
}
