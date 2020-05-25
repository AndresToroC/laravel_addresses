<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('admin@gmail.com')]
        ];

        foreach ($users as $key => $user) {
            $user = User::create($user);
            $user->assignRole('admin');
        }
    }
}
