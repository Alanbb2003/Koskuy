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
        Schema::create('fasilitas_bersama', function (Blueprint $table) {
            $table->increments("fasilitasbersama_id");
            $table->integer("kos_id");
            $table->integer("kamarmandi");
            $table->integer("tv");
            $table->integer("pemanasair");
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
        Schema::dropIfExists('fasilitas_bersama');
    }
};
