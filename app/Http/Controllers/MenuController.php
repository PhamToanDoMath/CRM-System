<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Controllers\Controller;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(10);
        $menu_groups = \App\Models\MenuGroup::all();
        return view('admin.menu.index', compact('menus','menu_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = Menu::create($request->validate([
            'name'=> 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'menu_group_id' => 'required',
        ]));
        // dd($request);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $menu->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('admin.menu.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menu 
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->validate([
            'name'=> 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]));

        
        return redirect()->route('admin.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        // Menu::where('id',$menu->id)->delete();
        $menu->delete();
        return redirect()->route('admin.menu.index');
    }

    
}
