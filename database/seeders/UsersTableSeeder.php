<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John',
                'postnom' => 'Doe',
                'prenom' => 'John',
                'sexe' => 'homme',
                'date_naissance' => '1990-01-01',
                'adresse' => '123 Main Street',
                'telephone' => '1234567890',
                'code_postal' => '10001',
                'photo' => null,
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password123'),
                'role' => 'Admin',
                'google_id' => null,
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Jane',
                'postnom' => 'Smith',
                'prenom' => 'Jane',
                'sexe' => 'femme',
                'date_naissance' => '1992-02-02',
                'adresse' => '456 Elm Street',
                'telephone' => '0987654321',
                'code_postal' => '10002',
                'photo' => null,
                'email' => 'janesmith@example.com',
                'password' => Hash::make('password123'),
                'role' => 'Client',
                'google_id' => null,
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Alice',
                'postnom' => 'Johnson',
                'prenom' => 'Alice',
                'sexe' => 'femme',
                'date_naissance' => '1995-03-03',
                'adresse' => '789 Oak Street',
                'telephone' => '0123456789',
                'code_postal' => '10003',
                'photo' => null,
                'email' => 'alicejohnson@example.com',
                'password' => Hash::make('password123'),
                'role' => 'Client',
                'google_id' => null,
                'remember_token' => Str::random(10),
            ]
        ]);
    }
}
