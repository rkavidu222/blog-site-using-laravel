<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            "name"=> "Kavindu",
            "email"=> "kk@gmail.com",
            "password"=> bcrypt("11111111")
        ]);
    }
}
