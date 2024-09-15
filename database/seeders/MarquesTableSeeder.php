<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MarquesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('marques')->insert([
            ['code' => 'CNN', 'name' => 'Canon', 'description' => 'Marque réputée pour ses appareils photo et objectifs de haute qualité.', 'actif' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'NKN', 'name' => 'Nikon', 'description' => 'Connu pour ses appareils photo reflex numériques et ses accessoires.', 'actif' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'SNY', 'name' => 'Sony', 'description' => 'Pionnier dans les appareils photo sans miroir avec capteurs haute résolution.', 'actif' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'FJ', 'name' => 'Fujifilm', 'description' => 'Spécialisé dans les appareils photo instantanés et hybrides.', 'actif' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'SGM', 'name' => 'Sigma', 'description' => "Fabricant d'objectifs et d'accessoires pour appareils photo.", 'actif' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
