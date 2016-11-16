<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorNodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_nodes', function (Blueprint $table) {
            $table->increments('SensorNode_ID');
            $table->integer('DeviceList_ID');
            $table->foreign('DeviceList_ID')->references('DeviceList_ID')->on('device_lists');
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
        Schema::dropIfExists('sensor_nodes');
    }
}
