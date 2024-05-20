<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // создаем суперюзера admin@gmail.com
        $superUser = User::create([
            'email'=>'admin@gmail.com',
            'name'=>'Admin',
            'password' => Hash::make('12345678'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        // создаем роль для admin@gmail.com super-user
        Role::create([
            'name' => 'super-user',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        // назначаем созданному пользователю созданную роль 
        // роль super-user для суперюзера admin@gmail.com
        $superUser->assignRole('super-user');
    }
}
