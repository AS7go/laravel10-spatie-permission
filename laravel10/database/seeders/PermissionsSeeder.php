<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'show posts']);
        Permission::create(['name'=>'add posts']);
        Permission::create(['name'=>'edit posts']);
        Permission::create(['name'=>'delete posts']);
    }
}
