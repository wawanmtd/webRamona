<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_values', function (Blueprint $table) {
            $table->increments('SensorValue_ID');
            $table->integer('Sensor_ID');
            $table->foreign('Sensor_ID')->references('Sensor_ID')->on('sensors');
            $table->integer('QuantityValue_ID');
            $table->foreign('QuantityValue_ID')->references('QuantityValue_ID')->on('quantity_values');
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
        Schema::dropIfExists('sensor_values');
    }
}
