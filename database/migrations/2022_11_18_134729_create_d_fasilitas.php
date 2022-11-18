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
        Schema::create('d_fasilitas', function (Blueprint $table) {
            $table->increments("fasilitas_id");
            $table->integer("kos_id");
            $table->integer("spring_bed");
            $table->integer("Ac");
            $table->integer("kamar_mandi_dalam");
            $table->integer("tv");
            $table->integer("pemanas_air");
            $table->integer("wifi");
            $table->integer("kulkas");
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
        Schema::dropIfExists('d_fasilitas');
    }
};
