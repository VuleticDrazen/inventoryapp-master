<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $positions = [
            ['name' => 'Frontend Developer', 'department_id' => 1],
            ['name' => 'Backend Developer', 'department_id' => 1],
            ['name' => 'HR Manager', 'department_id' => 2],
            ['name' => 'Team lead', 'department_id' => 1],
            ['name' => 'Full-stack developer', 'department_id' => 1],
            ['name' => 'Support technician', 'department_id' => 3],
            ['name' => 'Supply officer', 'department_id' => 4]

        ];
        foreach ($positions as $position) {
            Position::query()->create($position);
        }
    }
}
