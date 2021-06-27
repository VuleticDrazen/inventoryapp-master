<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        Department::query()->create([
            'name' => 'Delivery'
        ]);
        Department::query()->create([
            'name' => 'Managment'
        ]);
        Department::query()->create([
            'name' => 'Technical Support'
        ]);
        Department::query()->create([
            'name' => 'Office'
        ]);
    }
}
