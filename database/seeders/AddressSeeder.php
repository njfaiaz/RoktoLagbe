<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\District;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $district = District::pluck('id')->toArray();
        $upazila = Upazila::pluck('id')->toArray();
        $union = Union::pluck('id')->toArray();


        for ($i = 1; $i <= 1; $i++) {

            Address::create([
                // 'user_id' => $users[array_rand($users)],
                'user_id' => 01,
                'district_id' => $district[array_rand($district)],
                'upazila_id' => $upazila[array_rand($upazila)],
                'union_id' => $union[array_rand($union)],
            ]);
        }
    }
}
