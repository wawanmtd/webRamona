<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateDeviceSensor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_sensors', function (Blueprint $table) {
            $table->increments('DeviceSensor_ID');
            $table->integer('Device_ID');
            $table->foreign('Device_ID')->references('Device_ID')->on('devices');
            $table->integer('Sensor_ID');
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
        Schema::dropIfExists('device_sensors');
    }
}
