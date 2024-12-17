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
        $address = Address::pluck('id')->toArray();
        $blood_group = ['Ab+', 'AB-', 'A+', 'A-', 'B+', 'B-', 'O+', 'O-'];
        $gender = ['Male', 'Female'];


        for ($i = 1; $i <= 1; $i++) {

            Profile::create([
                'user_id' => 01,
                // 'user_id' => $users[array_rand($users)],
                'address_id' => $address[array_rand($address)],
                'blood_group' => $blood_group[array_rand($blood_group)],
                'gender' => $gender[array_rand($gender)],
                'phone_number' => rand(200, 99999999999),
                'previous_donation_date' => Carbon::now(),
                'all_donation_time' => rand(1, 10),
            ]);
        }
    }
}
