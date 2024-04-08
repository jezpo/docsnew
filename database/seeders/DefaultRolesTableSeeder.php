<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DefaultRolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator Role',
            'level' => 5,
        ]);

        Role::create([
            'name' => 'Editor',
            'slug' => 'editor',
            'description' => 'Editor Role',
            'level' => 3,
        ]);

        Role::create([
            'name' => 'User',
            'slug' => 'user',
            'description' => 'Basic User Role',
            'level' => 1,
        ]);
    }
}
