<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\UserListrik;
use App\Models\Tarif;
use App\Models\Penggunaan;
use App\Models\Tagihan;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $userListrik = new UserListrik;
        $userListrik->nomor_kwh = Str::uuid();
        $userListrik->alamat = 'test';
        $userListrik->tarif_id = 1;
        $userListrik->user_id = 2;
        $userListrik->save();

        $penggunaan = new Penggunaan;
        $penggunaan->bulan = 1;
        $penggunaan->tahun = 2025;
        $penggunaan->meter_awal = 1000;
        $penggunaan->meter_akhir = 1200;
        $penggunaan->user_listrik_id = $userListrik->id;
        $penggunaan->save();

        $tagihan = new Tagihan;
        $tagihan->bulan = 1;
        $tagihan->tahun = 2025;
        $tagihan->jumlah_meter =200;
        $tagihan->penggunaan_id = $penggunaan->id;
        $tagihan->user_listrik_id = $userListrik->id;
        $tagihan->save();

    }
}
