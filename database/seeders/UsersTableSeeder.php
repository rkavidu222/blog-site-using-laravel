<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\Models\Profile;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user= User::create([
            "name"=> "Kavindu",
            "email"=> "kk@gmail.com",
            "password"=> bcrypt("11111111"),
            'admin'=>1
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avatar' =>'uploads/avatars/1748516308ice.jpg',
            'about' => 'aaaa bbbb cccc dddd eeee ffff gggg hhhh iiii jjjj kkkk',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
        ]);
}
}
