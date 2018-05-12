<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchIntruktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_intruktur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batch_pelatihan_id')->default(0);
            $table->integer('instruktur_id')->default(0);
            $table->integer('flag')->default(1);
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
        Schema::dropIfExists('batch_intruktur');
    }
}
