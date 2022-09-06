<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bhola Kr. Khawas',
            'email' => 'bholakhawas@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
