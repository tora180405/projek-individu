<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\jenis_kontak;
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

        // $this->call([
        //    UserSeeder::class,
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);

        jenis_kontak::create([
            'jenis_kontak' => 'whatsapp'
        ]);
        
        jenis_kontak::create([
            'jenis_kontak' => 'line'
        ]);
        
        jenis_kontak::create([
            'jenis_kontak' => 'instagram'
        ]);

        jenis_kontak::create([
            'jenis_kontak' => 'facebook'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
