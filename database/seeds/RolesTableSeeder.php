<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'domicilary', 'guard_name' => 'web']
        ];

        foreach ($roles as $key => $rol) {
            Role::create($rol);
        }
    }
}
