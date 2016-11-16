<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorNodeGroupItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_node_group_items', function (Blueprint $table) {
            $table->increments('SensorNodeGroupItem_ID');
            $table->integer('SensorNode_ID');
            $table->foreign('SensorNode_ID')->references('SensorNode_ID')->on('sensor_nodes');
            $table->integer('SensorNodeGroup_ID');
            $table->foreign('SensorNodeGroup_ID')->references('SensorNodeGroup_ID')->on('sensor_node_groups');
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
        Schema::dropIfExists('sensor_node_group_items');
    }
}
