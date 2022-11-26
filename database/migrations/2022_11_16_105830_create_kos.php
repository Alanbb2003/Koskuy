<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->increments("id");
            $table->string("kos_nama");
            $table->string("kos_tipe");
            $table->string("kos_alamat");
            $table->string("kos_deskripsi");
            $table->string("kos_gambar");
            $table->string("kos_notelp");
            $table->string("kos_provinsi");
            $table->string("kos_kota");
            $table->string("kos_kecamatan");
            $table->string("kos_kelurahan");
            $table->string("kos_kodepos");
            $table->string("kos_link");
            $table->integer("owner");
            $table->string("status");
            $table->date("tanggal_awal")->nullable();
            $table->date("tangal_akhir")->nullable();
            // $table->integer("fasilitas_id");
            // $table->string("kos_harga");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kos');
    }
};
