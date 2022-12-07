<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k = new Kamar();
        $k->kos_id = "1";
        $k->jenis_kamar  ="premium";
        $k->harga_kamar = "500000";
        $k->jumlah_kamar="5";
        $k->luas_kamar = "4";
        $k->status_kamar = "Tersedia";
        $k->deskripsi_kamar = "ini kamar test";
        $k->ac="1";
        $k->kmd="1";
        $k->wifi = "1";
        $k->tv="1";
        $k->kulkas="1";
        $k->gambar_kamar="aaaaa";
        $k->created_at="2022-11-20 10:50:52";
        $k->updated_at="2022-11-20 10:50:52";
        $k->save();

        $k = new Kamar();
        $k->kos_id = "2";
        $k->jenis_kamar  ="premium";
        $k->harga_kamar = "500000";
        $k->jumlah_kamar="5";
        $k->luas_kamar = "4";
        $k->status_kamar = "Tersedia";
        $k->deskripsi_kamar = "ini kamar test";
        $k->ac="1";
        $k->kmd="1";
        $k->wifi = "1";
        $k->tv="1";
        $k->kulkas="1";
        $k->gambar_kamar="aaaaa";
        $k->created_at="2022-11-20 10:50:52";
        $k->updated_at="2022-11-20 10:50:52";
        $k->save();

        $k = new Kamar();
        $k->kos_id = "3";
        $k->jenis_kamar  ="premium";
        $k->harga_kamar = "500000";
        $k->jumlah_kamar="5";
        $k->luas_kamar = "4";
        $k->status_kamar = "Tersedia";
        $k->deskripsi_kamar = "ini kamar test";
        $k->ac="1";
        $k->kmd="1";
        $k->wifi = "1";
        $k->tv="1";
        $k->kulkas="1";
        $k->gambar_kamar="aaaaa";
        $k->created_at="2022-11-20 10:50:52";
        $k->updated_at="2022-11-20 10:50:52";
        $k->save();
    }
}
