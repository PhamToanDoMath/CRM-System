<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FilterMenuCategory extends Component
{
    use WithPagination;
    public $menus;
    public $menu_groups;

    public function render()
    {
        return view('livewire.filter-menu-category');
    }

    public function filterBy($category_id){
        $this->menus = Menu::where('menu_group_id',$category_id)->get();
    }

    public function toggle_available($menu_id){
        $menu = Menu::where('id',$menu_id)->update([
            'is_available' => DB::raw('abs(is_available-1)')
        ]);
        // $menu->save();
    }
}
