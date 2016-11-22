<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnodegroupYangbelum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensor_node_groups', function (Blueprint $table) {
            $table->foreign('MarkerType_ID')->references('MarkerType_ID')->on('marker_types');
            $table->binary('SensorNodeGroupMarker')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensor_node_groups', function (Blueprint $table) {
            //
        });
    }
}
