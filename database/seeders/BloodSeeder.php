<?php

namespace Database\Seeders;

use App\Models\Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodSeeder extends Seeder
{
    public function run(): void
    {
        $blood_group = [];
        Blood::insert([
            [
                "id" => 1,
                "blood_name" => "Ab+"
            ],
            [
                "id" => 2,
                "blood_name" => "AB-"
            ],
            [
                "id" => 3,
                "blood_name" => "A+"
            ],
            [
                "id" => 4,
                "blood_name" => "A-"
            ],
            [
                "id" => 5,
                "blood_name" => "B+"
            ],
            [
                "id" => 6,
                "blood_name" => "B-"
            ],
            [
                "id" => 7,
                "blood_name" => "O+"
            ],
            [
                "id" => 8,
                "blood_name" => "O-"
            ]
        ]);
    }
}
