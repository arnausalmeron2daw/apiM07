<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProviderSeeder extends Seeder
{
    public function run(): void
    {
        Provider::create([
            'name' => 'Arnau S.L',
            'address' => 'C/Turia 16',
            'city' => 'Begas',
            'phone' => 646751991,
            'email' => 'arnau@sl.com',
        ]);

        


    }
}
