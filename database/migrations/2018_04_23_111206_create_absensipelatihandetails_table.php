<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensipelatihandetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_pelatihan_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peserta_id')->nullable()->default(0);
            $table->integer('absensi_id')->nullable()->default(0);
            $table->integer('skedul_id')->nullable()->default(0);
            $table->string('status')->nullable();
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
        Schema::dropIfExists('absensi_pelatihan_detail');
    }
}
