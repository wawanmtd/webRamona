<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorNodeRemarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_node_remarks', function (Blueprint $table) {
            $table->increments('SensorNodeRemark_ID');
            $table->timestampTz('RemarkTimestamp');
            $table->integer('SensorNode_ID');
            $table->foreign('SensorNode_ID')->references('SensorNode_ID')->on('sensor_nodes');
            $table->integer('Member_ID');
            $table->foreign('Member_ID')->references('Member_ID')->on('members');
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
        Schema::dropIfExists('sensor_node_remarks');
    }
}
