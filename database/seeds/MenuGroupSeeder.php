<?php

use Illuminate\Database\Seeder;
use App\Models\MenuGroup;
class MenuGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuGroup::create([
            'name' => 'Appetizer'
        ]);
        MenuGroup::create([
            'name' => 'Main Course'
        ]);
        MenuGroup::create([
            'name' => 'Desserts'
        ]);
    }
}
