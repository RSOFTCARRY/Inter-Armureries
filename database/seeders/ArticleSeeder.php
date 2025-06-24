<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Exemple de 9 articles fictifs
        for ($i = 1; $i <= 9; $i++) {
            Article::create([
                'nom' => "Article $i",
                'description' => "Description de l'article $i. C'est un excellent produit.",
                'image' => 'default.jpg', // une image par défaut à placer dans storage/app/public/
            ]);
        }
    }
}
