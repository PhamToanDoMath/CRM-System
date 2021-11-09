<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create a admin account
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
        ]);

        //create a chef account
        User::create([
            'name' => 'chef',
            'email' => 'chef@chef.com',
            'password' => bcrypt('chef123'),
            'is_chef' => true,
        ]);

        //create a clerk account
        User::create([
            'name' => 'clerk',
            'email' => 'clerk@clerk.com',
            'password' => bcrypt('clerk123'),
            'is_chef' => true,
        ]);
    }
}
