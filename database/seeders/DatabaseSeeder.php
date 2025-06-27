<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crée un utilisateur test s'il n'existe pas
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'siret' => '12345678900000',
                'sia' => 'FR123456789', // <- Champ ajouté ici
                'password' => bcrypt('password'),
            ]
        );

        // Exécute le seeder des articles
        $this->call([
            ArticleSeeder::class,
        ]);
    }
}
