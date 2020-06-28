<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('admin@gmail.com'), 'role' => 'admin'],
            ['name' => 'domicilary', 'email' => 'domicilary@gmail.com', 'password' => Hash::make('domicilary@gmail.com'), 'role' => 'domicilary']
        ];

        foreach ($users as $key => $user) {
            $role = $user['role'];
            unset($user['role']);
            
            $user = User::create($user);
            $user->assignRole($role);
        }
    }
}
