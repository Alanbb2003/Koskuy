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
        Schema::create('kamar', function (Blueprint $table) {
            $table->increments("kamar_id");
            $table->integer("kos_id");
            $table->string("jenis_kamar");
            $table->string("harga_kamar");
            $table->string("jumlah_kamar");
            $table->string("luas_kamar");
            $table->string("status_kamar");
            $table->string("deskripsi_kamar");
            $table->integer("ac")->nullable();
            $table->integer("kmd")->nullable();
            $table->integer("wifi")->nullable();
            $table->integer("tv")->nullable();
            $table->integer("kulkas")->nullable();
            $table->string("gambar_kamar");
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
        Schema::dropIfExists('kamar');
    }
};
