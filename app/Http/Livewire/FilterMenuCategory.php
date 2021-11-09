<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\MenuGroup;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FilterMenuCategory extends Component
{
    public $menuItems;
    public $menu_groups;


    public function mount(){
        $this->menuItems = Menu::all();
        $this->menu_groups = MenuGroup::all();
    }
    public function render()
    {
        return view('livewire.filter-menu-category');
    }

    public function filterBy($category_id){
        $this->menuItems = Menu::where('menu_group_id',$category_id)->get();
    }

    public function toggle_available($menu_id){
        Menu::where('id',$menu_id)->update([
            'is_available' => DB::raw('abs(is_available-1)')
        ]);
    }
}
