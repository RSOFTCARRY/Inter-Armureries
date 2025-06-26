<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::create([
            'nom' => 'HK MR308',
            'description' => 'Carabine de haute précision pour le tir longue distance.',
            'prix' => 2599.99,
            'image' => 'articles/hk-mr308.jpg',
        ]);

        Article::create([
            'nom' => 'Glock 17',
            'description' => 'Pistolet semi-automatique très répandu, calibre 9mm.',
            'prix' => 649.00,
            'image' => 'articles/glock-17.jpg',
        ]);

        Article::create([
            'nom' => 'Benelli M4',
            'description' => 'Fusil à pompe semi-automatique calibre 12, utilisé par les forces spéciales.',
            'prix' => 1890.50,
            'image' => 'articles/benelli-m4.jpg',
        ]);

        Article::create([
            'nom' => 'HK MR308',
            'description' => 'Carabine de haute précision pour le tir longue distance.',
            'prix' => 3499.99,
            'image' => 'articles/hk-mr308.jpg',
        ]);

        Article::create([
            'nom' => 'Glock 17 Gen5',
            'description' => 'Pistolet semi-automatique fiable et moderne.',
            'prix' => 689.00,
            'image' => 'articles/glock-17.jpg',
        ]);

        Article::create([
            'nom' => 'Benelli M4',
            'description' => 'Fusil à pompe semi-automatique militaire.',
            'prix' => 1890.00,
            'image' => 'articles/benelli-m4.jpg',
        ]);
    }
}
