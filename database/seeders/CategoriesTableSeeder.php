<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::insert([
            ['nom' => 'Pistolet'],
            ['nom' => 'Fusil'],
            ['nom' => 'Revolver'],
            ['nom' => 'Calibre'],
            ['nom' => 'Carabine'],
            ['nom' => 'Accessoires'],
            ['nom' => 'Défense'],
            ['nom' => 'Munitions'],
        ]);
    }
}
