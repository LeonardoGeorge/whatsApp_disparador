<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Leonardo George',
            'email' => 'leonardogeorge30@gmail.com',
            'password' => Hash::make('250101'), // Forma mais moderna que bcrypt()
            'email_verified_at' => now(), // Adiciona verificação de email
            'remember_token' => null, // Pode ser nulo ou gerar um token
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
