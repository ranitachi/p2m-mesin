<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterperusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_perusahaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_perusahaan')->nullable();
            $table->string('pimpinan')->nullable();
            $table->text('alamat')->nullable();
            $table->integer('provinsi')->default(0);
            $table->integer('kabupaten_kota')->default(0);
            $table->integer('kecamatan')->default(0);
            $table->integer('kelurahan')->default(0);
            $table->integer('kode_pos')->default(0);
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('cp')->nullable();
            $table->string('bagian_cp')->nullable();
            $table->string('jenis_usaha')->nullable();
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
        Schema::dropIfExists('master_perusahaan');
    }
}
