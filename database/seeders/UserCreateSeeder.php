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
            "Baily Road",
            "Balughat",
            "Banani Bus Stand",
            "Banani DOHS",
            "Banani Graveyard",
            "Banani Naval Head Quarter",
            "Banani Road No. 1 - 11",
            "Banani Road No. 12 - 19",
            "Banani Road No. 20 - 28",
            "Banasree Block A",
            "Banasree Block C",
            "Banasree Block D",
            "Banasree Block E",
            "Banasree Block J",
            "Banasree Block K",
            "Baridhara",
            "Baridhara DOHS",
            "Barontek",
            "Bashtola",
            "Bashundhara",
            "Bashundhara Block A",
            "Bashundhara Block B",
            "Bashundhara Block C",
            "Bashundhara Block D",
            "Bashundhara Block F",
            "Bashundhara Block H",
            "Bashundhara Block I",
            "Bashundhara Bus Stand",
            "Bashundhara R/A",
            "Baunia",
            "Bawlia Para",
            "Bawneabad Area",
            "Begunbari",
            "Bepari Bari",
            "Bhuyia Para",
            "Bishteki",
            "Bonolota",
            "Box Nagar",
            "CDH Shampan",
            "Chairman bari",
            "Chalabon",
            "Chalabon - Ark Hospital",
            "Chamurkhan",
            "Coca Cola Bus Stop",
            "Confidence Shopping Mall",
            "Dakkhinkhan Army Society",
            "Dakkhinkhan Azompur Brac Market",
            "hinkhan Chairman Para",
            "hinkhan Dewan Bari",
            "hinkhan Gono Koborshathan Road",
            "hinkhan Hatim Bag",
            "hinkhan Holan",
            "hinkhan Jamtola",
            "hinkhan Kazi Bari",
            "hinkhan Mazi Bari",
            "Dakkhinkhan Miapara Mosjid Road",
            "Dakkhinkhan Mollartek",
            "Dakkhinkhan Muktijoddha Road",
            "Dakkhinkhan Nagoria Bari",
            "Dakkhinkhan Nogor Bari",
            "Dakkhinkhan Prem Bagan",
            "Dakkhinkhan Shamol Bagh",
            "Darus Salam"
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
