<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterpelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->nullable();
            $table->string('nama')->nullable();
            $table->integer('kategori_id')->default(0);
            $table->integer('flag')->default(1);
            $table->double('biaya_pelatihan')->default(0);
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
        Schema::dropIfExists('master_pelatihan');
    }
}
