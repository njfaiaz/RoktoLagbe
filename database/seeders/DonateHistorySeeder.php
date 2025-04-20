<?php

namespace Database\Seeders;

use App\Models\Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DonateHistory;
use App\Models\User;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;

class DonateHistorySeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $blood = Blood::pluck('id')->toArray();
        $gender = ['Male', 'Female'];

        for ($i = 0; $i < 10; $i++) {
            $district = District::inRandomOrder()->first();

            // Select an upazila that belongs to this district
            $upazila = Upazila::where('district_id', $district->id)->inRandomOrder()->first();

            // Select a union that belongs to this upazila
            $union = Union::where('upazila_id', $upazila?->id)->inRandomOrder()->first();

            DonateHistory::create([
                'user_id' => $users->random()->id ?? null,
                'blood_receiver_name' => fake()->name(),
                'blood_receiver_number' => rand(200, 99999999999),
                'blood_id' => $blood[array_rand($blood)],
                'gender' => $gender[array_rand($gender)],
                'district_id' => $district->id,
                'upazila_id' => $upazila?->id,
                'union_id' => $union?->id,
                'patient_details' => fake()->sentence(10),
            ]);
        }
    }
}
