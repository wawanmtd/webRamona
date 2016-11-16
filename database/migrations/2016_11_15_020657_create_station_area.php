<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_areas', function (Blueprint $table) {
            $table->increments('StationArea_ID');
            $table->integer('Station_ID');
            $table->foreign('Station_ID')->references('Station_ID')->on('stations');
            $table->integer('Area_ID');
            $table->foreign('Area_ID')->references('Area_ID')->on('areas');
            $table->integer('Member_ID');
            $table->foreign('Member_ID')->references('Member_ID')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('station_areas');
    }
}
