<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            ['name' => 'Ann Mathews'],
            ['name' => 'Maria Abraham'],
            ['name' => 'Joyal Mathew'],
            ['name' => 'John Varghese'],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
