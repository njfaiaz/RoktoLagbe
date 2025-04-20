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
            'role' => UserRole::SUPER_ADMIN->value,
            'password' => Hash::make('Abc@1234'),
        ]);

        $users = [
            "user",
            "Redwan Anjum",
            "Dina",

            'Junayed Rahman Faiaz',
            "Mahmudul Hasan Joy",
            "Sabrina Subah Nisa",
            "Abidul Islam",
            "Azizah",
            "shajed",
            "MOHON ISLAM",
            "Khaled Al mamun",
            "Kazi Noshin zaman",
            "Sk Hridoy Shanto",
            "Pori",
            "Shahrukh",
            "Rakib",
            "DILRUBA AKTER LUNA",
            "asif",
            "rahat fameda refat",
            "Rafi Rafi",
            "Mahmuda Ibnat",
            "Anika Anzum Zahin",
            "Pavel",
            "hamidur rahaman",
            "Mohammad Fazlul Kabir",
            "MD shuvo",
            "Emtiaj Aaraf",
            "B M Shaifullah",
            "kowshik",
            "Md Wahidul Islam",
            "nasrin nila",
            "Mehrab Hossain alvi",
            "Mahrush Nafasat",
            "Wasim",
            "Wafiq",
            "Lamia Farhin",
            "Dhritiman Paul",
            "SK.Rezaul Islam",
            "Tasneem Tanha Ahona",
            "sayla dewan",
            "Dilip Kumar paul",
            "hridoy",
            "Farjana Akther",
            "abdur rahman",
            "md rana",
            "Ashraful",
            "Nowsher Tanim",
            "Ramisha",
            "Sanjida Urmi",
            "towhid ahmed shimanto",
            "Attiar Rahman",
            "Zakir Hossain",
            "SARIFUL ISLAM",
            "Abul bashar",
            "Santo",
            "Ahsan Ul Kayum Bhuiya",
            "Sadman",
            "Faiyaz Hossen",
            "DELOWAR",
            "Asad Zaman",
            "Koli",
            "Miraz",
            "jesmin akter",
            "Razoana Ershad",
            "MD Shifat",
            "Ornob",
            "Faria",
            "Mohammad Ali Ekram",
            "Mohsin Rubel",
            "mobarak",
            "Liza Sadia",
            "Nobaira Mehreen Hassan",
            "Billal Hossain",
            "Tamanna Masoud",
            "muhit",
            "Md. Mohi Uddin Khan",
            "Iftikharul Islam",
            "Samira Akter",
            "Inteha Rahman",
            "Rimon",
            "Dr Md Khorshed Alam",
            "Manik Chandra Sutradhar",
            "yesin",
            "Shaila Noor",
            "Shahinur Rahman",
            "Shahriar Ahmed Shakib",
            "Mihir Paul",
            "Shahidul Islam",
            "sadi",
            "Inzamam Ul Haq",
            "Humaira Akter",
            "Mahdi Hasan",
            "Md. Asaduzzaman",
            "Gear Exact Bangladesh",
            "Razib Imran",
            "Shuvo",
            "MD MOSHIUR RAHMAN",
            "Shafiul Alam Sheaum",
            "md Mobarak Hossain"
        ];

        foreach ($users as $user) {
            User::create([
                'name' => strtolower($user),
                'username' => User::generateUniqueUsername($user),
                'email' => strtolower($user) . '@gmail.com',
                'role' => UserRole::USER->value,
                'password' => Hash::make('Abc@1234'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
