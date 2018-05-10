<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peserta_id')->default(0);
            $table->integer('pelatihan_id')->default(0);
            $table->string('jenis_tes')->nullable();
            $table->integer('batch_id')->default(0);
            $table->double('nilai')->default(0);
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
        Schema::dropIfExists('nilaites');
    }
}
