<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('Device_ID');
            $table->string('DeviceModel');
            $table->integer('Manufacturer_ID');
            $table->string('Description');
            $table->integer('SensorCount');

            $table->integer('Country_ID');
            $table->foreign('Country_ID')->references('Country_ID')->on('countries');

            $table->string('Remark');
            $table->string('VoltageRange');
            $table->integer('Member_ID');
            $table->integer('DocumentType_ID');
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
        Schema::dropIfExists('devices');
    }
}
