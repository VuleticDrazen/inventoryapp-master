<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $roles = ['1' => 'Super Administrator', '2' => 'Office Administrator', '3' => 'Support Administrator', '4' => 'User', '5'=> 'HR Manager'];
        foreach ($roles as $key => $role) {
            Role::query()->create(['id' => $key, 'name' => $role]);
        }
    }
}
