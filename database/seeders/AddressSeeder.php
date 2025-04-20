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
        $users = User::all();

        foreach ($users as $user) {
            $district = District::inRandomOrder()->first();

            $upazila = Upazila::where('district_id', $district->id)->inRandomOrder()->first();

            $union = Union::where('upazila_id', $upazila?->id)->inRandomOrder()->first();

            if ($district && $upazila && $union) {
                Address::create([
                    'user_id' => $user->id,
                    'district_id' => $district->id,
                    'upazila_id' => $upazila->id,
                    'union_id' => $union->id,
                ]);
            }
        }
    }
}
