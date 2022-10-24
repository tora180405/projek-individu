<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);

        \App\Models\User::create([
            'name' => 'walas',
            'email' => 'walas@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'walas'
        ]);

        \App\Models\User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'siswa'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
