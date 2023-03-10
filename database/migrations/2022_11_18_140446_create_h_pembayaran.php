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
        Schema::create('h_pembayaran', function (Blueprint $table) {
            // JANGAN DIHAPUS
            // $table->increments("id");
            // $table->integer("paket_id");
            // $table->integer("user_id");
            // $table->date("tangal_tagih");
            // $table->date("tangal_bayar");
            // $table->date("tangal_mulai_sewa");
            // $table->date("tangal_akhir_sewa");
            // $table->integer("status");
            // $table->timestamps();
            $table->increments("id");
            $table->integer("user_id");
            $table->integer("paket_id");
            $table->integer("kos_id");
            $table->integer("harga");
            $table->string("bukti")->nullable();
            $table->integer("status");
            $table->date("tgl_trans");
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
        Schema::dropIfExists('h_pembayaran');
    }
};
