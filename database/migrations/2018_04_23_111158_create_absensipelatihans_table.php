<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensipelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batch_id')->nullable()->default(0);
            $table->integer('skedul_id')->nullable()->default(0);
            $table->datetime('date')->nullable();
            $table->text('desc')->nullable();
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
        Schema::dropIfExists('absensi_pelatihan');
    }
}
