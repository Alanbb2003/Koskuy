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
        Schema::create('user', function (Blueprint $table) {
            $table->increments("id");
            $table->string("username");
            $table->string("fullname");
            $table->string("email");
            $table->timestamp('email_verified_at')->nullable();
            $table->string("password");
            $table->string("user_telp");
            $table->string("user_role");
            $table->string("user_gambar");
            $table->integer("status");
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
};
