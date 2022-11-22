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
        $k->kos_alamat = "siduarjo";
        $k->kos_tipe = "Putra";
        $k->fasilitas_id = 1;
        $k->kos_harga = "200000";
        $k->save();

        $k = new Kos();
        $k->kos_alamat = "Surabaya";
        $k->kos_tipe = "Putri";
        $k->fasilitas_id = 1;
        $k->kos_harga = "200000";
        $k->save();

    }
}
