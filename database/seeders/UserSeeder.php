<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

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
            'name'=> 'Hari Muhlia',
            'email'=> 'harimuhlia@gmail.com',
            'password'=> bcrypt('12345678'),
            'remember_token'=> Str::random(60),
            'penugasan'=> 'Produktif Multimedia',
            'role'=> 'Administrator'
        ]);

        User::create([
            'name'=> 'Ade Romansah',
            'email'=> 'aderomansah@gmail.com',
            'password'=> bcrypt('12345678'),
            'remember_token'=> Str::random(60),
            'penugasan'=> 'Produktif Perhotelan',
            'role'=> 'Pendidik'
        ]);
    }
}
