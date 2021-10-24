<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\MenuGroup;
class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $categories = MenuGroup::all();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'category' => $categories->where('id',$this->menu_group_id)->first()->name,
            'is_available' => $this->is_available,
            'image' => $this->getFirstMediaUrl('images'),
            'description' =>$this->description,
        ];
    }
}
