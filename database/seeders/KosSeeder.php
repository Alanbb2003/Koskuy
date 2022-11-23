<?php

namespace Database\Seeders;

use App\Models\Kos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k = new Kos();
        $k->kos_nama="mudahkos";
        $k->kos_tipe = "Putra";
        $k->kos_alamat = "siduarjo";
        $k->kos_deskripsi = "ini adalah data dummy untuk mencoba";
        $k->kos_gambar = "";
        $k->kos_notelp = "0849123123";
        $k->kos_provinsi = "jawa timur";
        $k->kos_kota = "surabaya";
        $k->kos_kecamatan = "testkecamatan";
        $k->kos_kelurahan = "testkelurahan";
        $k->kos_kodepos = "8499";
        $k->kos_link = "testlink";
        $k->owner = "2";
        $k->save();

        $k = new Kos();
        $k->kos_nama="mudahkos2";
        $k->kos_tipe = "Putri";
        $k->kos_alamat = "siduarjo";
        $k->kos_deskripsi = "ini adalah data dummy untuk mencoba";
        $k->kos_gambar = "";
        $k->kos_notelp = "0849123123";
        $k->kos_provinsi = "jawa timur";
        $k->kos_kota = "surabaya";
        $k->kos_kecamatan = "testkecamatan";
        $k->kos_kelurahan = "testkelurahan";
        $k->kos_kodepos = "8499";
        $k->kos_link = "testlink";
        $k->owner = "2";
        $k->save();
    }
}
