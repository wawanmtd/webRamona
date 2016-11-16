<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('Sensor_ID');
            $table->integer('SensorType_ID');
            $table->foreign('SensorType_ID')->references('SensorType_ID')->on('sensor_types');
            $table->string('FieldName');
            $table->integer('ValueCount');
            $table->string('Description');
            $table->integer('Member_ID');
            $table->foreign('Member_ID')->references('Member_ID')->on('members');
            $table->integer('MarkerType_ID');
            $table->integer('DocumentType_ID');
            $table->string('Marker');
            $table->string('Document');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}
