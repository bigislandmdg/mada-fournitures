<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProduitSeeder extends Seeder
{
    public function run(): void
    {
        $produits = [
            // Électronique et informatique
            ['categorie' => 'electronique-informatique', 'nom' => 'Ordinateur portable HP 15', 'unite' => 'pièce', 'prix_indicatif' => 2200000, 'description' => 'Intel Core i5, 8 Go RAM, 512 Go SSD.'],
            ['categorie' => 'electronique-informatique', 'nom' => 'Imprimante laser Canon', 'unite' => 'pièce', 'prix_indicatif' => 950000, 'description' => 'Imprimante laser monochrome A4, réseau.'],
            ['categorie' => 'electronique-informatique', 'nom' => 'Onduleur APC 650 VA', 'unite' => 'pièce', 'prix_indicatif' => 320000, 'description' => 'Protection contre les coupures de courant.'],
            ['categorie' => 'electronique-informatique', 'nom' => 'Switch réseau 8 ports', 'unite' => 'pièce', 'prix_indicatif' => 280000, 'description' => 'Switch Gigabit Ethernet 8 ports.'],

            // Téléphonie et communication
            ['categorie' => 'telephonie-communication', 'nom' => 'Smartphone Samsung A15', 'unite' => 'pièce', 'prix_indicatif' => 850000, 'description' => 'Écran 6.5 pouces, 128 Go, double SIM.'],
            ['categorie' => 'telephonie-communication', 'nom' => 'Radio portable Motorola', 'unite' => 'pièce', 'prix_indicatif' => 450000, 'description' => 'Talkie-walkie longue portée.'],

            // Produits agricoles
            ['categorie' => 'produits-agricoles', 'nom' => 'Semences de riz améliorées', 'unite' => 'kg', 'prix_indicatif' => 12000, 'description' => 'Variété à haut rendement adaptée à Madagascar.'],
            ['categorie' => 'produits-agricoles', 'nom' => 'Machette agricole', 'unite' => 'pièce', 'prix_indicatif' => 35000, 'description' => 'Lame en acier trempé, manche en bois.'],
            ['categorie' => 'produits-agricoles', 'nom' => 'Pulvérisateur 16L', 'unite' => 'pièce', 'prix_indicatif' => 180000, 'description' => 'Pulvérisateur à pression pour traitement des cultures.'],

            // Matériaux de construction
            ['categorie' => 'materiaux-construction', 'nom' => 'Ciment CPJ 35 (50 kg)', 'unite' => 'sac', 'prix_indicatif' => 32000, 'description' => 'Ciment Portland composé, sac de 50 kg.'],
            ['categorie' => 'materiaux-construction', 'nom' => 'Tôle bac alu 0.30 mm', 'unite' => 'm²', 'prix_indicatif' => 45000, 'description' => 'Tôle ondulée pour toiture.'],
            ['categorie' => 'materiaux-construction', 'nom' => 'Peinture acrylique blanche 20L', 'unite' => 'pot', 'prix_indicatif' => 180000, 'description' => 'Peinture intérieure et extérieure.'],
            ['categorie' => 'materiaux-construction', 'nom' => 'Tube PVC diamètre 100 mm', 'unite' => 'barre', 'prix_indicatif' => 25000, 'description' => 'Tube PVC pour plomberie, longueur 3m.'],
        ];

        foreach ($produits as $p) {
            $categorie = Categorie::where('slug', $p['categorie'])->first();
            if (!$categorie) {
                continue;
            }

            Produit::updateOrCreate(
                ['slug' => Str::slug($p['nom'])],
                [
                    'categorie_id'   => $categorie->id,
                    'nom'            => $p['nom'],
                    'description'    => $p['description'] ?? null,
                    'unite'          => $p['unite'] ?? 'pièce',
                    'prix_indicatif' => $p['prix_indicatif'] ?? null,
                    'stock'          => 100,
                    'actif'          => true,
                ]
            );
        }
    }
}