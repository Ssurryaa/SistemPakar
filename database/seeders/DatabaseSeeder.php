<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Surya',
            'email' => 'surya123@gmail.com',
            'email_verified_at' => 'NULL',
            'password' => bcrypt('surya123'),
            'remember_token' => 'NULL'
        ]);
    }
}
