<?php

namespace Database\Seeders;

use App\Models\PaketIklan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketIklanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $new1 = new  PaketIklan();
        $new1->nama_paket = "biasa";
        $new1->harga = 100000;
        $new1->waktu = "6 bulan";
        $new1->save();

        $new2 = new  PaketIklan();
        $new2->nama_paket = "premium";
        $new2->harga = 200000;
        $new2->waktu = "1 tahun";
        $new2->save();
    }
}
