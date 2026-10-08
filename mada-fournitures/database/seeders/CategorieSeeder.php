<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'nom'         => 'Électronique et informatique',
                'slug'        => 'electronique-informatique',
                'description' => 'Ordinateurs, imprimantes, accessoires, onduleurs et équipements réseau.',
                'ordre'       => 1,
            ],
            [
                'nom'         => 'Téléphonie et communication',
                'slug'        => 'telephonie-communication',
                'description' => 'Téléphones, smartphones, radios et accessoires.',
                'ordre'       => 2,
            ],
            [
                'nom'         => 'Produits agricoles',
                'slug'        => 'produits-agricoles',
                'description' => 'Semences, outils, équipements et matériel agricole.',
                'ordre'       => 3,
            ],
            [
                'nom'         => 'Matériaux de construction',
                'slug'        => 'materiaux-construction',
                'description' => 'Ciment, tôles, peinture, plomberie, électricité et outillage.',
                'ordre'       => 4,
            ],
        ];

        foreach ($categories as $cat) {
            Categorie::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}