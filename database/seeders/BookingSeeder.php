<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k = new Booking();
        $k->booking_id="1";
        $k->id_penyewa= "1";
        $k->id_owner = "2";
        $k->id_kos = "1";
        $k->booking_status = "acc";
        $k->created_at="2022-09-01 10:50:52";
        $k->updated_at="2022-09-01 10:50:52";
        $k->save();

        $k = new Booking();
        $k->booking_id="2";
        $k->id_penyewa= "1";
        $k->id_owner = "2";
        $k->id_kos = "2";
        $k->booking_status = "acc";
        $k->created_at="2022-10-01 10:50:52";
        $k->updated_at="2022-10-01 10:50:52";
        $k->save();

        $k = new Booking();
        $k->booking_id="3";
        $k->id_penyewa= "1";
        $k->id_owner = "2";
        $k->id_kos = "2";
        $k->booking_status = "acc";
        $k->created_at="2022-09-02 10:50:52";
        $k->updated_at="2022-09-02 10:50:52";
        $k->save();

        $k = new Booking();
        $k->booking_id="4";
        $k->id_penyewa= "1";
        $k->id_owner = "2";
        $k->id_kos = "1";
        $k->booking_status = "acc";
        $k->created_at="2022-08-05 10:50:52";
        $k->updated_at="2022-08-05 10:50:52";
        $k->save();

        $k = new Booking();
        $k->booking_id="5";
        $k->id_penyewa= "1";
        $k->id_owner = "2";
        $k->id_kos = "2";
        $k->booking_status = "acc";
        $k->created_at="2022-11-05 10:50:52";
        $k->updated_at="2022-11-05 10:50:52";
        $k->save();

        $k = new Booking();
        $k->booking_id="6";
        $k->id_penyewa= "1";
        $k->id_owner = "2";
        $k->id_kos = "2";
        $k->booking_status = "acc";
        $k->created_at="2022-11-20 10:50:52";
        $k->updated_at="2022-11-20 10:50:52";
        $k->save();
    }
}
