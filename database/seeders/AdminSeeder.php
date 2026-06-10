<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::create([
            'name' => 'Admin',
            'email' => 'saadhossam839@gmail.com',
            'password' => bcrypt('123456'),

        ]);

    }
}
