<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['code' => 'PHO', 'name' => 'Appareils photo', 'description' => "Tous types d'appareils photo, y compris reflex, hybrides et compacts.", 'actif' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'LNS', 'name' => 'Objectifs', 'description' => "Objectifs pour différentes marques et types d'appareils photo.", 'actif' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'ACC', 'name' => 'Accessoires', 'description' => 'Accessoires tels que trépieds, sacs, et filtres.', 'actif' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'LGT', 'name' => 'Éclairage', 'description' => "Équipement d'éclairage pour studio et photographie en extérieur.", 'actif' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'DRN', 'name' => 'Drones', 'description' => 'Drones pour la photographie aérienne et vidéographie.', 'actif' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
