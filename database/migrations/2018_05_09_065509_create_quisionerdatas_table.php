<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuisionerdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quisionerdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('peserta_id')->default(0);
            $table->integer('batch_id')->default(0);
            $table->integer('pelatihan_id')->default(0);
            $table->integer('instruktur_id')->default(0);
            $table->integer('quisioner_id')->default(0);
            $table->string('nilai')->nullable();
            $table->text('usulan')->nullable();
            $table->integer('flag')->default(1);
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
        Schema::dropIfExists('quisionerdatas');
    }
}
