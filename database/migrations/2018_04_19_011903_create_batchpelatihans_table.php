<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchpelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->nullable();
            $table->string('nama_batch')->nullable();
            $table->integer('pelatihan_id')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('angkatan')->default(0);
            $table->string('pic')->nullable();
            $table->string('flag')->nullable();
            $table->string('biaya_pelatihan')->nullable();
            $table->integer('instruktur_id')->default(0);
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
        Schema::dropIfExists('batch_pelatihan');
    }
}
