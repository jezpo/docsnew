<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class DefaultPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create([
            'name' => 'Create Post',
            'slug' => 'create_post',
            'description' => 'Permission to create a new post',
        ]);

        Permission::create([
            'name' => 'Edit Post',
            'slug' => 'edit_post',
            'description' => 'Permission to edit a post',
        ]);

        Permission::create([
            'name' => 'Delete Post',
            'slug' => 'delete_post',
            'description' => 'Permission to delete a post',
        ]);
    }
}
