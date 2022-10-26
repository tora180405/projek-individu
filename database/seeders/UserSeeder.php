<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);

        // User::create([
        //     'name' => 'walas',
        //     'email' => 'walas@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'role' => 'walas'
        // ]);
        /*
        User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'siswa'
        ]);
        */
    }
}
