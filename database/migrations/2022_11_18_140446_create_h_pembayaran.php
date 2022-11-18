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
            $table->increments("id");
            $table->integer("paket_id");
            $table->integer("user_id");
            $table->date("tangal_tagih");
            $table->date("tangal_bayar");
            $table->date("tangal_mulai_sewa");
            $table->date("tangal_akhir_sewa");
            $table->integer("status");
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
