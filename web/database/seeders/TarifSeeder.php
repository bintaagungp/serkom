<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tarif;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tarif = new Tarif;
        $tarif->daya = 900;
        $tarif->tarifperkwh = 2000;
        $tarif->save();
    }
}
