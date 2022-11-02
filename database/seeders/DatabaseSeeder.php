<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Home;
use App\Models\Rule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Admin::create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('adminadmin'),
        // ]);

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
        ]);

        Home::create([
            'video_url' => 'https://youtu.be/lPOpzOrT9a8',
            'landing_page_url' => 'https://ssddyonk.com/'

        ]);

        Rule::create([
            'key' => 0,
            'rules' => 'الشروط والاحكام ضع نصك'
        ]);
    }
}
