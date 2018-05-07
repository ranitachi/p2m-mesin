<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkedulpelatihandetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skedul_pelatihan_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skedul_id')->nullable()->default(0);
            $table->integer('materi_id')->nullable()->default(0);
            $table->integer('batch_id')->nullable()->default(0);
            $table->string('materi')->nullable();
            $table->integer('staf_id')->nullable()->default(0);
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
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
        Schema::dropIfExists('skedul_pelatihan_detail');
    }
}
