<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Cerca se esiste già per email
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'), 
                // 'email_verified_at' => now(), // se attivo verifica email
            ]
        );

        // Secondo utente di default (es. un utente di test)
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password123'),
            ]
        );
    }
}
