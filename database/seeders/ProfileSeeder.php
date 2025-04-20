<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Blood;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $gender = ['Male', 'Female'];
        $blood = Blood::pluck('id')->toArray();


        for ($i = 1; $i <= 1; $i++) {

            Profile::create([
                'user_id' => 01,
                // 'user_id' => $users[array_rand($users)],
                'blood_id' => $blood[array_rand($blood)],
                'gender' => $gender[array_rand($gender)],
                'phone_number' => rand(200, 99999999999),
                'image' => 'images/profile_av.jpg',
                'previous_donation_date' => Carbon::now(),
            ]);
        }
    }
}
