<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role; // Make sure this points to your actual Role model

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);
    }
}
