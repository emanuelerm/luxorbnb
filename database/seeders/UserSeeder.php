<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Christian',
                'surname' => 'Paliotta',
                'date_of_birth' => '01/01/2000',
                'email' => 'proprietario1@example.com',
                'password' => bcrypt('password1'),//-> PASSWORD CRIPTATA CON FUNZIONE LARAVEL.
            ],
            [
                'name' => 'Emanuele',
                'surname' => 'Rosella',
                'date_of_birth' => '01/01/2000',
                'email' => 'proprietario2@example.com',
                'password' => bcrypt('password2'),//-> PASSWORD CRIPTATA CON FUNZIONE LARAVEL.
            ],
            [
                'name' => 'Jorge',
                'surname' => 'Castillo',
                'date_of_birth' => '01/01/2000',
                'email' => 'proprietario3@example.com',
                'password' => bcrypt('password3'),//-> PASSWORD CRIPTATA CON FUNZIONE LARAVEL.
            ],
            [
                'name' => 'Matteo',
                'surname' => 'Aguiari',
                'date_of_birth' => '01/01/2000',
                'email' => 'proprietario4@example.com',
                'password' => bcrypt('password4'),//-> PASSWORD CRIPTATA CON FUNZIONE LARAVEL.
            ],
            [
                'name' => 'Nicola',
                'surname' => 'Di Quinzio',
                'date_of_birth' => '01/01/2000',
                'email' => 'proprietario5@example.com',
                'password' => bcrypt('password5'),//-> PASSWORD CRIPTATA CON FUNZIONE LARAVEL.
            ],
            [
                'name' => 'Davide',
                'surname' => 'Caputo',
                'date_of_birth' => '01/01/2000',
                'email' => 'proprietario6@example.com',
                'password' => bcrypt('password6'),//-> PASSWORD CRIPTATA CON FUNZIONE LARAVEL.
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
