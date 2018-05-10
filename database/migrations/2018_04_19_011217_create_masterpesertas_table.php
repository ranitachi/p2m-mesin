<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterpesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_peserta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap')->nullable();
            $table->string('nama_sertifikat')->nullable();
            $table->string('agama')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('provinsi')->default(0);
            $table->integer('kabupaten_kota')->default(0);
            $table->integer('kecamatan')->default(0);
            $table->integer('kelurahan')->default(0);
            $table->integer('kode_pos')->default(0);
            $table->string('telp')->nullable();
            $table->string('hp')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('email')->nullable();
            $table->string('foto')->nullable();
            $table->integer('flag')->default(1);
            $table->string('perusahaan_id')->nullable();
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
        Schema::dropIfExists('master_peserta');
    }
}
