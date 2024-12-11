<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCreateSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Junayed Rahman Faiaz',
            'username' => 'Junayed-Rahman-Faiaz',
            'email' => 'admin@gmail.com',
            'profile_image' => 'images/profile_av.jpg',
            'role' => UserRole::SUPER_ADMIN->value,
            'password' => Hash::make('Abc@1234'),
        ]);

        $users = [
            "Adabor",
            "Adam Ali Market",
            "Adarsha Bag",
            "Aftab nagar",
            "Agargaon",
            "Ahmed Nagar",
            "Akij Foundation",
            "Ananda Nagar",
            "Apollo Hospital",
            "APS Garments (Ati Para)",
            "Arjat Para",
            "Armanitola",
            "Army Stadium",
            "Asad Gate",
            "Ashalota",
            "Ashkona",
            "Ashkona Al Huda Mosjid",
            "Ashkona Boro Mosjid",
            "Ashkona City Complex Road",
            "Ashkona Dilder Bari",
            "Ashkona Mosjid Road",
            "Ashkona Panir Pamp",
            "Askona Noddapara Club Mor",
            "Askona Noddapara Mosjid Road",
            "Askona Rupali Garden",
            "Askona Rupali Tower",
            "Badda",
            "Badda Hossain Market",
            "Bagbari",
            "Baily Road"

        ];

        foreach ($users as $user) {
            User::create([
                'name' => strtolower($user),
                'username' => User::generateUniqueUsername($user),
                'email' => strtolower($user) . '@gmail.com',
                'profile_image' => 'images/user/' . rand(1, 15) . '.jpg',
                'role' => UserRole::USER->value,
                'password' => Hash::make('Abc@1234'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
