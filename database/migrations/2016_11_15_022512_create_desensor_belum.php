<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesensorBelum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_sensors', function (Blueprint $table) {
            $table->foreign('Member_ID')->references('Member_ID')->on('members');
            $table->foreign('Sensor_ID')->references('Sensor_ID')->on('sensors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_sensors', function (Blueprint $table) {
            //
        });
    }
}
