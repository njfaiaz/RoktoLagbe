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
        $genderOptions = ['Male', 'Female'];
        $bloods = Blood::pluck('id')->toArray();

        $users = User::all();

        foreach ($users as $user) {
            Profile::create([
                'user_id' => $user->id,
                'blood_id' => $bloods[array_rand($bloods)],
                'gender' => $genderOptions[array_rand($genderOptions)],
                'phone_number' => '01' . rand(100000000, 999999999),
                'image' => 'images/profile_av.jpg',
                'previous_donation_date' => Carbon::now()->subDays(rand(0, 365)),
            ]);
        }
    }
}
