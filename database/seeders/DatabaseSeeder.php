<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Crée un utilisateur test seulement s'il n'existe pas déjà
    \App\Models\User::firstOrCreate(
        ['email' => 'test@example.com'],
        [
            'name' => 'Test User',
            'password' => bcrypt('password'), // ou ce que tu veux
        ]
    );

    // Exécute le seeder des articles
    $this->call([
        ArticleSeeder::class,
    ]);
}


}
