<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterpesertadatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_peserta_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peserta_id')->default(0);
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('gelar_pendidikan')->nullable();
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
        Schema::dropIfExists('master_peserta_data');
    }
}
