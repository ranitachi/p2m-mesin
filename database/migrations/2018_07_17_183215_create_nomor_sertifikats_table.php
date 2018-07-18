<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomorSertifikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomor_sertifikat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batch_id')->nullable()->default(0);
            $table->string('nomor_sertifikat')->nullable();
            $table->integer('direktur_id')->nullable()->default(0);
            $table->integer('peserta_id')->nullable()->default(0);
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
        Schema::dropIfExists('nomor_sertifikat');
    }
}
