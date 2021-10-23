<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use  Spatie\MediaLibrary\MediaCollections\Models\Media;
class ImageController extends Controller
{
    public function update($menu){
        // $menu->getFirstMedia('images')
    }
    public function destroy(Media $image){
        dd($image);
        return redirect()->back();
    }
}
