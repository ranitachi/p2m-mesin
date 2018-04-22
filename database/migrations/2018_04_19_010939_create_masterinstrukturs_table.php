<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterinstruktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_instruktur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
            $table->string('agama')->nullable();
            $table->string('gelar_s1')->nullable();
            $table->string('gelar_s2')->nullable();
            $table->string('gelar_s3')->nullable();
            $table->string('gelar_lain')->nullable();
            $table->text('alamat')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('hp')->nullable();
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
        Schema::dropIfExists('master_instruktur');
    }
}
