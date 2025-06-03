<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Setting::create([

            'site_name'=> "Laravel Blog",
            'address' => "Bibile, Sri Lanka",
            'contact_number' =>"070 000 00 00",
            'contact_email' =>'info@laravel.blog.com'
        ]);

    }
}
