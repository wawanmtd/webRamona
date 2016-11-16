<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeinstationBelum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_in_stations', function (Blueprint $table) {
            $table->foreign('Member_ID')->references('Member_ID')->on('members');
            $table->foreign('Station_ID')->references('Station_ID')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_in_stations', function (Blueprint $table) {
            //
        });
    }
}
