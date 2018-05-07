<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBidangAfiliasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_instruktur', function (Blueprint $table) {
            $table->string('bidang_keahlian')->nullable();
            $table->string('afiliasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_instruktur', function (Blueprint $table) {
            //
        });
    }
}
