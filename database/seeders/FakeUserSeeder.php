<?php

namespace Database\Seeders;

use App\Models\FakeUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakeUserSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            FakeUser::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'fake_user_name' => fake()->name(),
                    'fake_user_phone_number' => fake()->phoneNumber(),
                    'fake_user_details' => fake()->paragraph(),
                ]
            );
        }
    }
}
