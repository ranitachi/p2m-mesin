<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkedulpelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skedul_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batch_id')->nullable()->default(0);
            $table->string('weekday')->nullable();
            $table->datetime('date')->nullable();
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
        Schema::dropIfExists('skedul_pelatihan');
    }
}
