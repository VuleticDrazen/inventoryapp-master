<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {

        User::query()->create([
            'name' => 'Super administrator',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1,
            'position_id' => 4
        ]);
        User::query()->create([
            'name' => 'Office administrator',
            'email' => 'officeadmin@mail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2,
            'position_id' => 7
        ]);
        User::query()->create([
            'name' => 'Support administrator',
            'email' => 'supportadmin@mail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 3,
            'position_id' => 6
        ]);
        User::query()->create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 4,
            'position_id' => 5
        ]);
        User::query()->create([
            'name' => 'HR manager',
            'email' => 'hr@mail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 5,
            'position_id' => 3
        ]);
    }
}
