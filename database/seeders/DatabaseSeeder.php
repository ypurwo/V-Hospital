<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'doctor']);
    	Role::create(['name'=>'admin']);
    	Role::create(['name'=>'patient']);
        Role::create(['name'=>'nurse']);
    }
}
