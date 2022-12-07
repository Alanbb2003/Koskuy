<?php

namespace Database\Seeders;

use App\Models\HPembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $n = new HPembayaran();
        $n->user_id = 2;
        $n->paket_id = 1;
        $n->kos_id = 1;
        $n->harga = 100000;
        $n->status = 2;
        $n->tgl_trans = now();
        $n->save();

        $n = new HPembayaran();
        $n->user_id = 2;
        $n->paket_id = 2;
        $n->kos_id = 2;
        $n->harga = 200000;
        $n->status = 2;
        $n->tgl_trans = now();
        $n->save();

        $n = new HPembayaran();
        $n->user_id = 2;
        $n->paket_id = 1;
        $n->kos_id = 1;
        $n->harga = 100000;
        $n->status = 2;
        $n->tgl_trans = now();
        $n->save();

        $n = new HPembayaran();
        $n->user_id = 2;
        $n->paket_id = 2;
        $n->kos_id = 2;
        $n->harga = 200000;
        $n->status = 2;
        $n->tgl_trans = now();
        $n->save();

        $n = new HPembayaran();
        $n->user_id = 2;
        $n->paket_id = 1;
        $n->kos_id = 2;
        $n->harga = 100000;
        $n->status = 2;
        $n->tgl_trans = now();
        $n->save();

        $n = new HPembayaran();
        $n->user_id = 2;
        $n->paket_id = 2;
        $n->kos_id = 1;
        $n->harga = 200000;
        $n->status = 2;
        $n->tgl_trans = now();
        $n->save();

        $n = new HPembayaran();
        $n->user_id = 2;
        $n->paket_id = 2;
        $n->kos_id = 3;
        $n->harga = 200000;
        $n->status = 2;
        $n->tgl_trans = now();
        $n->save();
    }
}
