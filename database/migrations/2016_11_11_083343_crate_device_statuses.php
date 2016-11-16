<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateDeviceStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_statuses', function (Blueprint $table) {
            $table->increments('DeviceStatus_ID');
            $table->tinyInteger('InService');
            $table->string('Description');
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
        Schema::dropIfExists('device_statuses');
    }
}
