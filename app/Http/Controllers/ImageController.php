<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use  Spatie\MediaLibrary\MediaCollections\Models\Media;
class ImageController extends Controller
{
    public function update(Request $request, $menu_id){
        
        if($request->hasFile('image') && $request->file('image')->isValid()){
            Menu::find($menu_id)->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->back()->with('message','Updated new image');
    }
    public function destroy($menu_id){
        // dd($image);
        if($menu_id){
            // dd(Menu::find($menu_id)->first()->getFirstMedia('images'));
            return redirect()->back()->with('message','Deleted image');
        }
    }

}
