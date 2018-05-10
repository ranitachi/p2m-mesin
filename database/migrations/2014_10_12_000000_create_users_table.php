<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * flag level user
         * --> [0] admin
         * --> [1] direktur
         * --> [2] pegawai
         */

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('level');
            $table->integer('flag');
            $table->string('hakakses')->nullable();
            $table->integer('pegawai_id')->default(0);
            $table->integer('direktur_id')->default(0);
            $table->integer('instruktur_id')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
