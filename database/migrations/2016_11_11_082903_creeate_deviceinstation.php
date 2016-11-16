<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreeateDeviceinstation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_in_stations', function (Blueprint $table) {
            $table->increments('DeviceInStation_ID');
            $table->integer('Station_ID');
            $table->integer('DeviceList_ID');
            $table->foreign('DeviceList_ID')->references('DeviceList_ID')->on('device_lists');
            $table->double('Altitude');
            $table->integer('Member_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_in_stations');
    }
}
